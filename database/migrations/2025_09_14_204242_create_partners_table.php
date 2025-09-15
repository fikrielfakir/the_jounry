<?php
// database/migrations/xxxx_create_partners_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->string('website')->nullable();
            $table->enum('partnership_type', ['sponsor', 'vendor', 'collaborator', 'media'])->nullable()->index();
            $table->enum('tier', ['platinum', 'gold', 'silver', 'bronze'])->nullable()->index();
            $table->json('contact_info')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->integer('display_order')->default(0)->index();
            $table->date('partnership_start')->nullable();
            $table->date('partnership_end')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};