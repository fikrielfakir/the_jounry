<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo};
use Illuminate\Database\Eloquent\SoftDeletes;

class EventRegistration extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'event_id', 
        'payment_status',
        'stripe_payment_intent_id',
        'amount_paid',
        'additional_info',
        'registration_date',
        'attendance_status',
        'cancellation_reason'
    ];

    protected $casts = [
        'additional_info' => 'array',
        'amount_paid' => 'decimal:2',
        'registration_date' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($registration) {
            if (empty($registration->registration_date)) {
                $registration->registration_date = now();
            }
        });
    }

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    // Scopes
    public function scopeCompleted($query)
    {
        return $query->where('payment_status', 'completed');
    }

    public function scopePending($query)
    {
        return $query->where('payment_status', 'pending');
    }

    public function scopeAttended($query)
    {
        return $query->where('attendance_status', 'attended');
    }

    // Helper Methods
    public function isCompleted(): bool
    {
        return $this->payment_status === 'completed';
    }

    public function isPending(): bool
    {
        return $this->payment_status === 'pending';
    }

    public function cancel(string $reason = null): bool
    {
        $this->update([
            'payment_status' => 'cancelled',
            'cancellation_reason' => $reason
        ]);

        // Decrement participant count
        $this->event->decrement('current_participants');

        return true;
    }
}
