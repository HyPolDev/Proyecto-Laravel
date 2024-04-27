<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User_chat;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class User_chatController extends Controller
{
    public function enterTheChat(Request $request,)
    {
        try {
            $chat_id = $request->input('chat_id');
            $chat = Chat::find($chat_id);

            if (!$chat) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Chat not found",
                    ],
                    404
                );
            }

            $user_chat = new User_chat;
            $user_chat->user_id = auth()->user()->id;
            $user_chat->chat_id = $chat_id;

            $user_chat->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "User entered the chat successfully",
                    "data" => $user_chat
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "User can't enter the chat",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }
    public function leaveTheChat(Request $request)
    {

        try {
            $chat_id = $request->input('chat_id');
            $chat = Chat::find($chat_id);

            if (!$chat) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Chat not found",
                    ],
                    404
                );
            }

            $user_chat = User_chat::where('user_id', auth()->user()->id)
                ->where('chat_id', $chat_id)
                ->first();

            if (!$user_chat) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "User not in the chat",
                    ],
                    404
                );
            }

            $user_chat->delete();

            return response()->json(
                [
                    "success" => true,
                    "message" => "User left the chat successfully",
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "User can't leave the chat",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }
}
