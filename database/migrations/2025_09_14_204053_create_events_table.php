<?php
// database/migrations/xxxx_create_events_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('slug')->unique(); // SEO-friendly URLs
            $table->text('description')->nullable();
            $table->text('short_description')->nullable(); // For cards/listings
            $table->date('event_date')->index();
            $table->time('event_time')->nullable();
            $table->datetime('event_datetime')->storedAs('CONCAT(event_date, " ", COALESCE(event_time, "00:00:00"))')->index();
            $table->string('location')->nullable();
            $table->json('location_details')->nullable(); // Store coordinates, venue info
            $table->integer('max_participants')->default(0);
            $table->integer('current_participants')->default(0)->index();
            $table->decimal('price', 10, 2)->default(0)->index();
            $table->json('images')->nullable(); // Store multiple images
            $table->enum('category', ['sustainable_tourism', 'culture', 'entertainment'])->default('culture')->index();
            $table->enum('status', ['draft', 'published', 'cancelled', 'completed'])->default('draft')->index();
            $table->enum('difficulty_level', ['beginner', 'intermediate', 'advanced'])->nullable()->index();
            $table->json('requirements')->nullable(); // Prerequisites, what to bring
            $table->json('tags')->nullable(); // For filtering and search
            $table->foreignId('club_id')->nullable()->constrained('clubs')->nullOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('registration_deadline')->nullable()->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->integer('views_count')->default(0)->index();
            $table->timestamps();
            
            // Composite indexes for common queries
            $table->index(['status', 'event_date']);
            $table->index(['category', 'event_date']);
            $table->index(['club_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};