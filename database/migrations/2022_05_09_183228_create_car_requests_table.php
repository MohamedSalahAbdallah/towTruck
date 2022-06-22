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
        Schema::create('car_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("user_id");
            $table->integer("driver_id");
            $table->string("driver_name");
            $table->string("destination");
            $table->string("location");
            $table->string("pickup_time");
            $table->string("dropoff_time");
            $table->string("date");
            $table->double("rating");
            $table->double("price");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_requests');
    }
};
