<?php

namespace App\Http\Controllers;

use App\Models\Chat;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getAllChats()
    {
        $chats = Chat::all();
        return response()->json($chats);
    }
    // public function getProfile(Request $request)
    // {
    //     $user = $request->user();
    //     return response()->json($user);
    // }
    // public function updateProfile(Request $request)
    // {
    //     $user = $request->user();
    //     return response()->json($user);
    // }
}
