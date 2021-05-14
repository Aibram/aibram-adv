<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('desc');
            $table->unsignedBigInteger('parent_id')->nullable();
            // icon as media
            $table->unsignedTinyInteger('home')->default(1);
            $table->unsignedTinyInteger('main')->default(1);
            $table->unsignedInteger('ordering')->default(1);
            $table->unsignedTinyInteger('status')->default(1);
            $table->unsignedInteger('no_ads')->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
