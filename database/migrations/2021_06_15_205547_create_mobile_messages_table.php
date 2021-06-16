<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobileMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_messages', function (Blueprint $table) {
            $table->id();
            $table->string('provider');
            $table->string("mobile");
            $table->string("reason")->nullable();
            $table->text("options")->nullable();
            $table->string("title")->nullable();
            $table->string("response")->nullable();
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
        Schema::dropIfExists('mobile_messages');
    }
}
