<?php

use App\Http\Controllers\TaskController;
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

Route::get ('/', function () {
    return view ("welcome");
});

Route::get ('/tasks', [TaskController::class,'getAllTasks']);
Route::get ('/tasks', [TaskController::class,'createTask']);
Route::get ('/tasks/{id}', [TaskController::class,'updateTaskById']);
Route::get ('/tasks/{id}', [TaskController::class,'deleteTaskById']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
