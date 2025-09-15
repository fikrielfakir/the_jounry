<?php
// database/migrations/xxxx_create_clubs_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->unique(); // For SEO-friendly URLs
            $table->string('city', 100)->nullable()->index();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable(); // For listings
            $table->decimal('coordinates_lat', 10, 7)->nullable()->index();
            $table->decimal('coordinates_lng', 10, 7)->nullable()->index();
            $table->string('logo')->nullable();
            $table->json('contact_info')->nullable(); // Store phone, email, social media
            $table->json('settings')->nullable(); // Club-specific settings
            $table->foreignId('manager_id')->nullable()->constrained('users')->nullOnDelete();
            $table->boolean('is_active')->default(true)->index();
            $table->integer('max_members')->default(100);
            $table->timestamps();
            
            // Spatial index for location-based queries (MySQL 8.0+)
            $table->index(['coordinates_lat', 'coordinates_lng']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};