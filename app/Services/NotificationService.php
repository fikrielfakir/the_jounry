<?php
// app/Services/NotificationService.php

namespace App\Services;

use App\Models\{EventRegistration, User, Event};
use Illuminate\Support\Facades\{Mail, Log};
use Illuminate\Support\Facades\Notification;

class NotificationService
{
    public function sendRegistrationConfirmation(EventRegistration $registration): void
    {
        try {
            $user = $registration->user;
            $event = $registration->event;
            
            if (!$user || !$event) {
                Log::warning('Registration confirmation skipped: missing user or event', [
                    'registration_id' => $registration->id
                ]);
                return;
            }

            // Log the registration confirmation (in a real app, you'd send actual email)
            Log::info('Registration confirmation sent', [
                'user_id' => $user->id,
                'user_email' => $user->email,
                'event_id' => $event->id,
                'event_title' => $event->title,
                'registration_id' => $registration->id,
                'amount_paid' => $registration->amount_paid
            ]);

            // In a real implementation, you would send actual emails here:
            // Mail::to($user->email)->send(new EventRegistrationConfirmation($registration));
            
        } catch (\Exception $e) {
            Log::error('Failed to send registration confirmation', [
                'registration_id' => $registration->id,
                'error' => $e->getMessage()
            ]);
            
            // Don't throw the exception to avoid breaking the registration process
        }
    }

    public function sendEventReminder(Event $event, User $user): void
    {
        try {
            Log::info('Event reminder sent', [
                'user_id' => $user->id,
                'event_id' => $event->id,
                'event_title' => $event->title
            ]);
            
            // In a real implementation:
            // Mail::to($user->email)->send(new EventReminder($event, $user));
            
        } catch (\Exception $e) {
            Log::error('Failed to send event reminder', [
                'user_id' => $user->id,
                'event_id' => $event->id,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function sendEventCancellation(Event $event, User $user): void
    {
        try {
            Log::info('Event cancellation notification sent', [
                'user_id' => $user->id,
                'event_id' => $event->id,
                'event_title' => $event->title
            ]);
            
            // In a real implementation:
            // Mail::to($user->email)->send(new EventCancellation($event, $user));
            
        } catch (\Exception $e) {
            Log::error('Failed to send event cancellation notification', [
                'user_id' => $user->id,
                'event_id' => $event->id,
                'error' => $e->getMessage()
            ]);
        }
    }
}