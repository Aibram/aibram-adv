<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_conversations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('receiver_id');
            $table->unsignedBigInteger('chatlist_id');
            $table->unsignedBigInteger('advertisement_id');
            $table->unsignedTinyInteger('status')->default(1);
            $table->string('message_type', false, true);
            $table->text('message_content', false, true);
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
            $table->foreign('sender_id')->references('id')->on('users');
            $table->foreign('receiver_id')->references('id')->on('users');
            $table->foreign('advertisement_id')->references('id')->on('advertisements');
            $table->foreign('chatlist_id')->references('id')->on('chat_lists');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_conversations');
    }
}
