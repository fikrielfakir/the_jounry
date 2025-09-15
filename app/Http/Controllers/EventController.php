<?php
// app/Http/Controllers/EventController.php

namespace App\Http\Controllers;

use App\Models\{Event, EventRegistration};
use App\Services\{PaymentService, NotificationService};
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\{DB, Cache, Log};
use App\Http\Requests\EventRegistrationRequest;

class EventController extends Controller
{
    public function __construct(
        private PaymentService $paymentService,
        private NotificationService $notificationService
    ) {}

    public function index(Request $request)
    {
        $cacheKey = 'events_' . md5(serialize($request->all()));
        
        $events = Cache::remember($cacheKey, 300, function () use ($request) {
            $query = Event::with(['club', 'registrations'])
                ->published()
                ->upcoming();

            // Apply filters
            if ($request->filled('category')) {
                $query->where('category', $request->category);
            }

            if ($request->filled('city')) {
                $query->whereHas('club', fn($q) => $q->where('city', $request->city));
            }

            if ($request->filled('price_max')) {
                $query->where('price', '<=', $request->price_max);
            }

            return $query->orderBy('event_date')
                ->paginate(12)
                ->withQueryString();
        });

        return view('events.index', compact('events'));
    }

    public function show(Event $event)
    {
        $event->load(['club', 'registrations.user', 'testimonials.user']);
        $event->incrementViews();
        
        $similarEvents = Cache::remember("similar_events_{$event->id}", 3600, function () use ($event) {
            return Event::published()
                ->upcoming()
                ->where('category', $event->category)
                ->where('id', '!=', $event->id)
                ->take(4)
                ->get();
        });

        return view('events.show', compact('event', 'similarEvents'));
    }

    public function register(EventRegistrationRequest $request, Event $event): JsonResponse
    {
        if (!$event->isRegistrationOpen()) {
            return response()->json([
                'success' => false,
                'message' => 'Registration is not available for this event.'
            ], 400);
        }

        $user = $request->user();
        
        // Check for existing registration
        if ($this->userAlreadyRegistered($user->id, $event->id)) {
            return response()->json([
                'success' => false,
                'message' => 'You are already registered for this event.'
            ], 409);
        }

        DB::beginTransaction();
        try {
            $registration = $this->processRegistration($event, $user, $request);
            
            // Send notifications
            $this->notificationService->sendRegistrationConfirmation($registration);
            
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Registration successful!',
                'registration_id' => $registration->id
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Event registration failed', [
                'user_id' => $user->id,
                'event_id' => $event->id,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Registration failed. Please try again.'
            ], 500);
        }
    }

    private function userAlreadyRegistered(int $userId, int $eventId): bool
    {
        return EventRegistration::where('user_id', $userId)
            ->where('event_id', $eventId)
            ->exists();
    }

    private function processRegistration(Event $event, $user, Request $request): EventRegistration
    {
        $paymentStatus = 'completed';
        $paymentIntentId = null;

        if ($event->price > 0) {
            $paymentResult = $this->paymentService->processPayment(
                $event->price,
                $request->payment_method_id,
                $user,
                $event
            );
            
            $paymentIntentId = $paymentResult['payment_intent_id'];
            $paymentStatus = $paymentResult['status'];
        }

        $registration = EventRegistration::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'payment_status' => $paymentStatus,
            'stripe_payment_intent_id' => $paymentIntentId,
            'amount_paid' => $event->price,
            'additional_info' => $request->additional_info ?? []
        ]);

        // Update participant count
        $event->increment('current_participants');

        // Clear relevant caches
        Cache::forget("events_" . $event->id);
        Cache::tags(['events', 'user_' . $user->id])->flush();

        return $registration;
    }
}