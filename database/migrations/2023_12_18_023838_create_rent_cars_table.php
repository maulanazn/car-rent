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
        Schema::create('rent_cars', function (Blueprint $table) {
            $table->id();
            $table->date('start_rent');
            $table->date('done_rent');
            $table->string('license_plate_number');
            $table->foreign('license_plate_number')->references('license_plate_number')->on('cars')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('user_name');
            $table->foreign('user_name')->references('name')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_cars');
    }
};
