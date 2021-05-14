<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            // main_photo as media
            // photo_list as media
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->string('region')->nullable();
            $table->float('price')->nullable();
            $table->string('address');
            $table->string('contact_method');
            $table->string('mobile')->nullable();
            $table->text('desc');
            // Tags 
            $table->unsignedTinyInteger('featured')->default(0);
            $table->unsignedTinyInteger('home')->default(1);
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedInteger('no_properties')->default(0);
            $table->unsignedInteger('no_chatlists')->default(0);
            $table->unsignedInteger('no_ratings')->default(0);
            $table->unsignedInteger('no_favorites')->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
