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
            $table->string('mark',30);
            $table->string('model',30);
            $table->string('color',30);
            $table->integer('year')->nullable();
            $table->string('type',30)->nullable();
            $table->string('fuel',30)->nullable();
            $table->string('registration_no',30)->nullable();
            $table->integer('passenger_seats')->nullable();
            $table->string('vin',30)->nullable();
            $table->string('gear_box',30)->nullable();
            $table->text('car_properties')->nullable();
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
