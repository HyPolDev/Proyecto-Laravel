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
    public function updateProfile(Request $request)
    {
        try {
            $user = $request->user();
            $newUserName = $request->input('userName');


            $existingUser = User::where('userName', $newUserName)->first();
            if ($existingUser && $existingUser->id !== $user->id) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Username already in use"
                    ],
                    401
                );
            }


            $user->userName = $newUserName;
            $user->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "User updated",
                    "data" => $user
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error updating user",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }
    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                "success" => false,
                "message" => "User not found."
            ], 404);
        }

        if ($user->roleName === '3' || $user->roleName === '2' ) {
            return response()->json([
                "success" => false,
                "message" => "The superadmin or admin cannot be deleted."
            ], 400);
        }

        $user->message()->delete();

        $user->delete();

        return response()->json([
            "success" => true,
            "message" => "User deleted successfully."
        ]);
    }
};
