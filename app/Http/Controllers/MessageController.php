<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Game;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function getAllMessagesFromChat($id)
    {
        try {
            $chat = Chat::find($id);

            if (!$chat) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Chat not found",
                    ],
                    404
                );
            }

            $messages = Message::where('chat_id', $id)->get();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Messages retrieved successfully",
                    "data" => $messages
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "Messages can't be retrieved",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function createMessage(Request $request)
    {
        try {
            $message = new Message;
            $message->text = $request->input('text');
            $message->user_id =  auth()->user()->id;
            $message->chat_id = $request->input('chat_id');


            $message->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Message created successfully",
                    "data" => $message
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "Message cant be created",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function updateMessageById(Request $request, $id)
    {
        try {
            $messageId = $id;
            $messageText = $request->input('text');

            $message = Message::find($messageId);
            // validar que existe el mensaje
            if ($messageText) {
                $message->text = $messageText;
            }

            $message->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Message updated successfully",
                    "data" => $message
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "Message cant be updated",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function deleteMessageById($id)
    {
        try {
            $message = Message::find($id);

            if (!$message) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Message does not exist",
                    ],
                    404
                );
            }

            $user = Auth::user();

            if ($user->id != $message->user_id) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Unauthorized",
                    ],
                    403
                );
            }

            $messageDeleted = Message::destroy($id);

            return response()->json(
                [
                    "success" => true,
                    "message" => "Message deleted successfully",
                    "data" => $messageDeleted
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "Message cant be deleted",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }
}
