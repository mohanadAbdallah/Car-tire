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
            $table->id();
            $table->bigInteger('customer_id')->unsigned()->index();
            $table->bigInteger('tire_id')->unsigned()->index();
            $table->string('car_number')->nullable();
            $table->string('type')->nullable();
            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->string('tire_size')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('vehicle_type')->nullable()->default(0);
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('tire_id')->references('id')->on('tires')->onDelete('cascade');
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
