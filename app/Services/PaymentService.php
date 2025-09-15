<?php
// app/Services/PaymentService.php

namespace App\Services;

use Stripe\{Stripe, PaymentIntent};
use App\Models\{User, Event};
use Illuminate\Support\Facades\Log;

class PaymentService
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function processPayment(float $amount, string $paymentMethodId, User $user, Event $event): array
    {
        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => intval(round($amount * 100)),
                'currency' => config('app.currency', 'mad'),
                'payment_method' => $paymentMethodId,
                'confirm' => true,
                'metadata' => [
                    'user_id' => $user->id,
                    'event_id' => $event->id,
                    'event_title' => $event->title
                ]
            ]);

            return [
                'status' => $paymentIntent->status === 'succeeded' ? 'completed' : 'failed',
                'payment_intent_id' => $paymentIntent->id
            ];

        } catch (\Exception $e) {
            Log::error('Payment processing failed', [
                'user_id' => $user->id,
                'event_id' => $event->id,
                'amount' => $amount,
                'error' => $e->getMessage()
            ]);

            throw $e;
        }
    }
}