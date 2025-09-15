<?php
// database/migrations/xxxx_create_event_registrations_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->timestamp('registration_date')->useCurrent()->index();
            $table->enum('payment_status', ['pending', 'completed', 'failed', 'refunded'])->default('pending')->index();
            $table->string('stripe_payment_intent_id')->nullable()->index();
            $table->decimal('amount_paid', 10, 2)->default(0);
            $table->json('additional_info')->nullable(); // Dietary restrictions, emergency contact
            $table->enum('attendance_status', ['registered', 'attended', 'no_show'])->default('registered')->index();
            $table->text('cancellation_reason')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'event_id']);
            $table->index(['event_id', 'payment_status']);
            $table->index(['user_id', 'registration_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
    }
};