<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::create('cars', function (Blueprint $table) {
        $table->id('carID'); // Primary key
        $table->string('carName'); // Car name
        $table->string('carType'); // Car type
        $table->string('carLicense')->unique(); // Unique license plate
        $table->decimal('carPrice', 10, 2); // Rental price
        $table->enum('carStatus', ['available', 'rented'])->default('available'); // Status of the car
        $table->unsignedBigInteger('rentID')->nullable()->default(null); // Rent ID, default is null
        $table->timestamps(); // Adds created_at and updated_at columns
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
