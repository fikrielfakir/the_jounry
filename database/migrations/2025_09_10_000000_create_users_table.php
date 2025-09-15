<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Basic fields
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            // Profile fields
            $table->string('phone', 20)->nullable();
            $table->string('avatar')->nullable();
            $table->text('bio')->nullable();

            // Role / access control
            $table->enum('role', ['user', 'club_manager', 'admin'])->default('user');

            // Preferences
            $table->json('preferences')->nullable();

            // Authentication helpers
            $table->rememberToken();

            // Soft deletes & timestamps
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
