<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chats';

    protected $fillable = ['name', 'description', 'game_id'];

    public function game()
    {
        return $this->belongsTo('App\Models\Game', 'game_id');
    }
}
