<?php
// app/Models/Club.php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Club extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'city', 'description', 'short_description',
        'coordinates_lat', 'coordinates_lng', 'logo', 'contact_info',
        'settings', 'manager_id', 'is_active', 'max_members'
    ];

    protected $casts = [
        'contact_info' => 'array',
        'settings' => 'array',
        'is_active' => 'boolean',
        'coordinates_lat' => 'decimal:7',
        'coordinates_lng' => 'decimal:7',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($club) {
            if (empty($club->slug)) {
                $club->slug = Str::slug($club->name);
            }
        });
    }

    // Relationships
    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function members(): HasMany
    {
        return $this->hasMany(User::class)->active();
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    // Accessors
    protected function logo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset('storage/' . $value) : asset('images/default-club-logo.png')
        );
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCity($query, $city)
    {
        return $query->where('city', $city);
    }

    public function scopeWithLocation($query)
    {
        return $query->whereNotNull(['coordinates_lat', 'coordinates_lng']);
    }

    // Helper Methods
    public function getMembersCount(): int
    {
        return $this->members()->count();
    }

    public function getUpcomingEventsCount(): int
    {
        return $this->events()
            ->where('status', 'published')
            ->where('event_date', '>=', now())
            ->count();
    }

    public function hasAvailableSpots(): bool
    {
        return $this->getMembersCount() < $this->max_members;
    }
}