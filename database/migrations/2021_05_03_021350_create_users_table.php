<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            // photo as media
            $table->string('mobile')->unique();
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedInteger('age');
            $table->string('gender');
            $table->unsignedTinyInteger('activated')->default(0);
            $table->timestamp('activated_at')->nullable();
            $table->unsignedInteger('status')->default(1);
            $table->unsignedInteger('no_ads')->default(0);
            $table->unsignedInteger('no_chats')->default(0);
            $table->unsignedInteger('no_ratings')->default(0);
            $table->unsignedInteger('no_favorites')->default(0);
            $table->string('password');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
