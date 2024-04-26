<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('text', 255);
            $table->timestamps();
            $table->unsignedBigInteger('chat_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('chat_id')->references('id')->on('chats')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
