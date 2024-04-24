<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasFactory;
    use HasApiTokens;

    protected $table = 'users';

    protected $fillable = ['roleName', 'userName', 'email', 'password'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true;
}
