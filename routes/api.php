<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\TaskController;
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

// Route::get('/tasks', [TaskController::class, 'getAllTasks'])->middleware('auth:sanctum');
// Route::get('/tasks', [TaskController::class, 'createTask']);
// Route::get('/tasks/{id}', [TaskController::class, 'updateTaskById']);
// Route::get('/tasks/{id}', [TaskController::class, 'deleteTaskById']); //ejemplo GAMES o MENSAJES


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::delete('/logout', [AuthController::class, 'logOut'])->middleware('auth:sanctum'); //funciona

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//User
Route::get('/user', [UserController::class, 'getAllUsers'])->middleware('auth:sanctum') ->middleware('isSuperAdmin');
Route::get('/user/profile', [UserController::class, 'getProfile'])->middleware('auth:sanctum');
Route::put('/user/profile', [UserController::class, 'updateProfile'])->middleware('auth:sanctum'); // funciona


//Chat Esto aun no está

// Route::get('/chat', [ChatController::class, 'getAllChats'])->middleware('auth:sanctum'); //funciona pero aun no hemos metido chats con seeder
// Route::get('/chat/{id}', [ChatController::class, 'getChatById'])->middleware('auth:sanctum'); //
// Route::post('/chat', [ChatController::class, 'createChat'])->middleware('auth:sanctum'); //
// Route::put('/chat', [])

//comento esto porque si no lo hago no me funciona la ruta
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
