<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserChatTable extends Migration
{
    public function up()
    {
        Schema::create('user_chat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('chat_id');
            $table->timestamps();

            // Define foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('chat_id')->references('id')->on('chats')->onDelete('cascade');

            // Optionally, you can add unique constraints if a user should not be able to join the same chat multiple times.
            $table->unique(['user_id', 'chat_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_chat');
    }
}
