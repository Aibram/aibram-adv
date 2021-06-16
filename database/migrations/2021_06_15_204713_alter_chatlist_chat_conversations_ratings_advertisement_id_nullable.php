<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterChatlistChatConversationsRatingsAdvertisementIdNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chat_conversations', function (Blueprint $table) {
            $table->unsignedBigInteger('advertisement_id')->nullable()->change();
        });
        Schema::table('chat_lists', function (Blueprint $table) {
            $table->unsignedBigInteger('advertisement_id')->nullable()->change();
        });
        Schema::table('user_ratings', function (Blueprint $table) {
            $table->unsignedBigInteger('advertisement_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
