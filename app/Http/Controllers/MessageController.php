<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // public function getAllMessagesFromRoomById($id)
    // {
    //     try {
    //         // $messages = Message::all();
    //         $roomId = $id;
    //         $mymessages = Message::query()
    //             ->where('room_id', $roomId)
    //             ->get();





    //         return response()->json(
    //             [
    //                 "success" => true,
    //                 "message" => "Messages retrieved successfully",
    //                 "data" => $mymessages
    //             ],
    //             200
    //         );
    //     } catch (\Throwable $th) {
    //         return response()->json(
    //             [
    //                 "success" => false,
    //                 "message" => "Messages cant be retrieved successfully",
    //                 "error" => $th->getMessage()
    //             ],
    //             500
    //         );
    //     }
    // }

    public function createMessage(Request $request)
    {
        try {
            $message = new Message;
            $message->text = $request->input('text');
            $message->user_id =  auth()->user()->id;
            $message->room_id = $request->input('room_id');


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

    // public function updateMessageById(Request $request, $id)
    // {
    //     try {

    //         $messageId = $id;

    //         $messageText = $request->input('text');


    //         $message = Message::find($messageId);

    //         // validar que existe el mensaje

    //         if ($messageText) {
    //             $message->text = $messageText;
    //         }



    //         $message->save();

    //         return response()->json(
    //             [
    //                 "success" => true,
    //                 "message" => "Message updated successfully",
    //                 "data" => $message
    //             ],
    //             200
    //         );
    //     } catch (\Throwable $th) {
    //         return response()->json(
    //             [
    //                 "success" => false,
    //                 "message" => "Message cant be updated",
    //                 "error" => $th->getMessage()
    //             ],
    //             500
    //         );
    //     }
    // }


    // public function deleteMessageById($id)
    // {
    //     try {
    //         $messageDeleted = Message::destroy($id);

    //         return response()->json(
    //             [
    //                 "success" => true,
    //                 "message" => "Message deleted successfully",
    //                 "data" => $messageDeleted
    //             ],
    //             200
    //         );
    //     } catch (\Throwable $th) {
    //         return response()->json(
    //             [
    //                 "success" => false,
    //                 "message" => "Message cant be deleted",
    //                 "error" => $th->getMessage()
    //             ],
    //             500
    //         );
    //     }
    // }
}
