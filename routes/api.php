<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view("welcome");
});


//Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::delete('/logout', [AuthController::class, 'logOut'])->middleware('auth:sanctum'); //funciona

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//User
Route::get('/user', [UserController::class, 'getAllUsers'])->middleware('auth:sanctum')->middleware('isSuperAdmin');
Route::get('/user/profile', [UserController::class, 'getProfile'])->middleware('auth:sanctum');
Route::put('/user/profile', [UserController::class, 'updateProfile'])->middleware('auth:sanctum'); // funciona
Route::delete('/user/{id}', [UserController::class, 'deleteUser'])->middleware('auth:sanctum')->middleware('isSuperAdmin'); //funciona validacion superadmin o admin controlada

//Game

Route::post('/game', [GameController::class, 'createGame'])->middleware('auth:sanctum')->middleware('isSuperAdmin'); //funciona
Route::delete('/game/{id}', [GameController::class, 'deleteGame'])->middleware('auth:sanctum')->middleware('isSuperAdmin'); //funciona
Route::get('/game', [GameController::class, 'getAllGames'])->middleware('auth:sanctum'); // funciona
Route::put('/game/{id}', [GameController::class, 'updateGame'])->middleware('auth:sanctum')->middleware('isSuperAdmin'); // funciona


//Chat

Route::post('/chat', [ChatController::class, 'createChat'])->middleware('auth:sanctum'); // funciona
Route::get('/chat', [ChatController::class, 'getAllChats'])->middleware('auth:sanctum'); // funciona
Route::get('/chat/{id}', [ChatController::class, 'getChatById'])->middleware('auth:sanctum'); // funciona
Route::delete('/chat/{id}', [ChatController::class, 'deleteChat'])->middleware('auth:sanctum')->middleware('isSuperAdmin'); // funciona
Route::get('/chat/{id}', [ChatController::class, 'getChatById'])->middleware('auth:sanctum'); //


//Message
Route::post('/chat/message', [MessageController::class, 'createMessage'])->middleware('auth:sanctum');
Route::put('/chat/message/{id}', [MessageController::class, 'updateMessageById'])->middleware('auth:sanctum');
Route::delete('/chat/message/{id}', [MessageController::class, 'deleteMessageById'])->middleware('auth:sanctum');
Route::get('/messages/{game}', [MessageController::class, 'getAllMessagesFromRoomByGameName'])->middleware('auth:sanctum');;

//comento esto porque si no lo hago no me funciona la ruta
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
