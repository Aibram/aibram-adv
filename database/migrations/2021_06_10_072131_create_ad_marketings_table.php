<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdMarketingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_marketings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('age_from');
            $table->unsignedInteger('age_to');
            $table->string('gender');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('advertisement_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('advertisement_id')->references('id')->on('advertisements');
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
        Schema::dropIfExists('ad_marketings');
    }
}
