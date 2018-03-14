<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CircleProfileProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circle_profile_properties', function (Blueprint $table) {
            $table->integer('circle_id')->unsigned();
            $table->foreign('circle_id')->references('id')->on('circles');
            $table->integer('property_id')->unsigned();
            $table->foreign('property_id')->references('id')->on('profile_property_dmn');
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
        Schema::dropIfExists('circle_profile_properties');
    }

}
