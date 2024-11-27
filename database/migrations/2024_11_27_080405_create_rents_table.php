<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id('rentID'); // Primary key
            $table->unsignedBigInteger('userID'); // Foreign key to users table
            $table->unsignedBigInteger('carID'); // Foreign key to cars table
            $table->string('carName');
            $table->integer('duration'); // Duration in days
            $table->string('pickup'); // Pickup location
            $table->string('dropoff'); // Drop-off location
            $table->decimal('total', 10, 2); // Total cost
            $table->enum('rentStatus', ['pending', 'rented', 'declined'])->default('pending');
            $table->timestamp('dateRequested')->nullable(); // Date requested
            $table->timestamp('rentDate')->nullable(); // Actual rent date
            $table->timestamp('returnDate')->nullable(); // Return date
            $table->timestamps(); // Created at and updated at

            // Foreign key constraints
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('carID')->references('carID')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rents');
    }
};
