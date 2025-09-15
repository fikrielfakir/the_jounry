<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'role', 'club_id', 
        'avatar', 'is_active', 'preferences', 'last_login_at'
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'preferences' => 'array',
        'is_active' => 'boolean',
        'password' => 'hashed',
    ];

    // Relationships
    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function managedClubs(): HasMany
    {
        return $this->hasMany(Club::class, 'manager_id');
    }

    public function createdEvents(): HasMany
    {
        return $this->hasMany(Event::class, 'created_by');
    }

    public function testimonials(): HasMany
    {
        return $this->hasMany(Testimonial::class);
    }

    // Accessors & Mutators
    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset('storage/' . $value) : asset('images/default-avatar.png')
        );
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByRole($query, $role)
    {
        return $query->where('role', $role);
    }

    // Helper Methods
    public function isAdmin(): bool
    {
        return in_array($this->role, ['super_admin', 'club_admin']);
    }

    public function canManageClub(Club $club): bool
    {
        return $this->role === 'super_admin' || $this->managedClubs->contains($club);
    }

    public function getEventsAttendedCount(): int
    {
        return $this->registrations()
            ->where('attendance_status', 'attended')
            ->count();
    }

    public function updateLastLogin(): void
    {
        $this->update(['last_login_at' => now()]);
    }
}