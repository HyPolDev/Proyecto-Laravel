<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserChatsTable extends Migration
{
    public function up()
    {
        Schema::create('user_chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('chat_id');
            $table->timestamps();

          
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('chat_id')->references('id')->on('chats')->onDelete('cascade');

            $table->unique(['user_id', 'chat_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_chats');
    }
}
