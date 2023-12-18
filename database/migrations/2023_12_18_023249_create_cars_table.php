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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('type');
            $table->string('license_plate_number')->unique();
            $table->string('rent_per_day');
            $table->string('user_name');
            $table->foreign('user_name')->references('name')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->enum('status', ['filled', 'away']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
