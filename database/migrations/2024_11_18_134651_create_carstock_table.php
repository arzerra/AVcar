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
        Schema::create('carstocks', function (Blueprint $table) {
            $table->id('stockID'); // Primary key for carstocks
            $table->string('carName')->unique(); // Car name (e.g., Toyota Vios)
            $table->integer('carCount')->default(0); // Number of cars available in the "cars" table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carstocks');
    }
};