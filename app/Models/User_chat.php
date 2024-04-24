<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_chat extends Model
{
    use HasFactory;
    protected $table = 'user_chats';

    protected $fillable = ['user_id', 'chat_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function chat()
    {
        return $this->belongsTo('App\Models\Chat', 'chat_id');
    }
}
