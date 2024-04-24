<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {

            Log::info("REGISTERING USER");

            $userName = $request->input("userName");
            $password = $request->input("password");
            $email = $request->input("email");

            $hashPassword = brypt($password);

            $newUser = new User();
            $newUser->userName  = $userName;
            $newUser->password  = $password;
            $newUser->email  = $email;

            $validator = Validator::make($request->all(), [
                "userName" => "required|unique:users|max:50",
                "password" => "required|unique:users",
                "email" => "required|unique:users"
            ]);

            if($validator->fails()){
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Validator failed",
                        "error" => $validator->errors()
                    ]
                    );
            }

            $newUser->save();

            return response()->json([
                "succes" => true,
                "message" => "user registered succesfully",
                "data" => $newUser
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "user couln't log in",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }

    public function login(Request $request){
    try{
       $email = $request-> input("email");
       $password = $request->input("password");

       $newUser = new User();
       $newUser->password  = $password;
       $newUser->email  = $email;

       $validator = Validator::make($request->all(), [
           "userName" => "required|unique:users|max:50",
           "password" => "required|unique:users",
           "emil"
       ]);

       if($validator->fails()){
           return response()->json(
               [
                   "success" => false,
                   "message" => "Validator failed",
                   "error" => $validator->errors()
               ],500
           )
        }

       $user = User::query()
        ->where("email", $email)
        ->first();

        if(!$user){
            return response()->json(
                [
                    "success" => false,
                    "message" => "Validator failed",
                    "error" => $validator->errors()
                ],500
            )
        };

        $checkUserPassoword = Hash::check($password, $user->password);

        if(!$checkUserPassoword){
            return response()->json(
                [
                    "success" => false,
                    "message" => "Validator failed",
                    "error" => $validator->errors()
                ],500
            )
        };

        $token = $user ->createToken('api-token')->plainTextToken;

        return response()->json(
            [
                "success" => true,
                "message" => "user logged",
                "token" => $token
            ],200
        )

    } catch (\Throwable $th){
        return response()->json(
            [
                "success" => false,
                "message" => "user couln't log in",
                "error" => $th->getMessage()
            ],
            500
        );
    }
};

