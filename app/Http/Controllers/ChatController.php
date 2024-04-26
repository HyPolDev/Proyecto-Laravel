<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Game;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function createChat(Request $request)
    {
        try {
            $chat = new Chat;
            $chat->name = $request->input('name');
            $chat->description = $request->input('description');
            $chat->game_id = $request->input("game_id");
            $chat->user_id = auth()->user()->id;

            $game_id = $request->input('game_id');
            $user_id = $chat->id;
            $user = auth()->user();

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'game_id' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'name or game invalid'
                    ]
                );
            }

            $chats = chat::query()
                ->where('game_id', $game_id)
                ->get();

            foreach ($chats as $chat) {
                if ($chat->user_id === $user->id) {
                    return response()->json(
                        [
                            'success' => false,
                            'message' => 'You already have a chat with this game!'

                        ]
                    );
                }
            }

            $chat->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Chats created successfully",
                    "data" => $chat
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "Cant be created chat",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }



    //
    public function getAllChats()
    // {
    //     $chats = Chat::all();
    //     return response()->json($chats);
    // }
    {
        try {
            $chats = Chat::query()
                ->select('name', 'description', 'user_id', 'game_id')
                ->where('user_id', auth()->user()->id)
                ->get();

            return response()->json(
                [
                    "success" => true,
                    "message" => "chats retrieved successfully",
                    "data" => $chats
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "chats cant be retrieved successfully",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function getChatsByGameName($gameName)

    {
        try {

            $game = Game::where("gameName", $gameName)
                ->first();

            $chats = Chat::where("game_id", $game->id)
                ->get();



            return response()->json(
                [
                    "success" => true,
                    "message" => "chats retrieved successfully",
                    "data" => $chats
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "chats cant be retrieved successfully",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function getChatById($id)

    {
        try {
            $chats = Chat::find($id);

            if (!$chats) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "this chat not exist"
                    ],
                    404
                );
            }

            return response()->json(
                [
                    "success" => true,
                    "message" => "chats retrieved successfully",
                    "data" => $chats
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "chats cant be retrieved successfully",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function deleteChat($id)
    {
        try {
            $chat = Chat::find($id);

            if (!$chat) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "chat couldn't be deleted successfully"
                    ],
                    404
                );
            }

            $chat->delete();

            return response()->json([
                "success" => true,
                "message" => "Chat deleted successfully."
            ]);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "chat couldn't be deleted successfully",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }
}
