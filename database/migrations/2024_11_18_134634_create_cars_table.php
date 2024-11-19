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
        $table->id('carID');
        $table->string('carName'); // Car name (e.g., Toyota Vios)
        $table->string('carType');
        $table->string('carLicense')->unique();
        $table->decimal('carPrice', 10, 2);
        $table->enum('carStatus', ['available', 'rented'])->default('available');
        $table->unsignedBigInteger('rentID')->default(0); // Set rentID default value to 0
        $table->timestamps();
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
