<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $users = User::all();
        return response()->json($users);
    }
    public function getProfile(Request $request)
    {
        $user = $request->user();
        return response()->json($user);
    }
}
