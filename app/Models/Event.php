<?php
// app/Models/Event.php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'description', 'short_description', 'event_date', 'event_time',
        'location', 'location_details', 'max_participants', 'current_participants',
        'price', 'images', 'category', 'status', 'difficulty_level', 'requirements',
        'tags', 'club_id', 'created_by', 'registration_deadline', 'is_featured'
    ];

    protected $casts = [
        'event_date' => 'date',
        'event_time' => 'datetime:H:i',
        'event_datetime' => 'datetime',
        'registration_deadline' => 'datetime',
        'location_details' => 'array',
        'images' => 'array',
        'requirements' => 'array',
        'tags' => 'array',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->title . '-' . $event->event_date->format('Y-m-d'));
            }
        });
    }

    // Relationships
    public function registrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function testimonials(): HasMany
    {
        return $this->hasMany(Testimonial::class);
    }

    // Accessors
    protected function featuredImage(): Attribute
    {
        return Attribute::make(
            get: fn () => !empty($this->images) ? asset('storage/' . $this->images[0]) : asset('images/default-event.jpg')
        );
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>=', now()->toDateString());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeAvailable($query)
    {
        return $query->whereRaw('current_participants < max_participants OR max_participants = 0');
    }

    // Helper Methods
    public function getAvailableSpots(): int
    {
        return $this->max_participants > 0 
            ? max(0, $this->max_participants - $this->current_participants)
            : PHP_INT_MAX;
    }

    public function isFull(): bool
    {
        return $this->max_participants > 0 && $this->current_participants >= $this->max_participants;
    }

    public function isRegistrationOpen(): bool
    {
        $now = now();
        return $this->status === 'published' &&
               $this->event_date >= $now->toDateString() &&
               (!$this->registration_deadline || $this->registration_deadline > $now) &&
               !$this->isFull();
    }

    public function isPast(): bool
    {
        return $this->event_date < now()->toDateString();
    }

    public function incrementViews(): void
    {
        $this->increment('views_count');
    }

    public function getAverageRating(): float
    {
        return $this->testimonials()->avg('rating') ?? 0;
    }
}