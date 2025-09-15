<?php
// database/migrations/xxxx_create_testimonials_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('event_id')->nullable()->constrained()->nullOnDelete(); // Link to specific event
            $table->text('content');
            $table->tinyInteger('rating')->default(5)->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->boolean('is_approved')->default(false)->index();
            $table->string('author_name')->nullable(); // For anonymous testimonials
            $table->string('author_title')->nullable(); // Job title, etc.
            $table->json('metadata')->nullable(); // Additional data
            $table->timestamps();
            
            $table->index(['is_approved', 'is_featured']);
            $table->index(['rating', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};