<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{User, Club, Event, Partner, Testimonial};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@thejourney.ma',
            'role' => 'super_admin'
        ]);

        // Create clubs with managers
        $clubs = collect(['Casablanca', 'Rabat', 'Marrakech', 'Fes', 'Tangier'])
            ->map(fn($city) => Club::factory()->create([
                'city' => $city,
                'manager_id' => User::factory()->create(['role' => 'club_admin'])->id
            ]));

        // Create events for each club
        $clubs->each(function ($club) {
            Event::factory(8)->create(['club_id' => $club->id]);
        });

        // Create regular users and assign to clubs
        User::factory(50)->create()->each(function ($user) use ($clubs) {
            $user->update(['club_id' => $clubs->random()->id]);
        });

        // Create partners
        Partner::factory(10)->create();

        // Create testimonials
        Testimonial::factory(20)->create();
    }
}