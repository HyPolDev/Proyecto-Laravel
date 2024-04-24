<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';

    protected $fillable = ['text', 'chat_id', 'user_id'];

    // Definir la relación con Chat
    public function chat()
    {
        return $this->belongsTo('App\Models\Chat', 'chat_id');
    }

    // Definir la relación con User
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
