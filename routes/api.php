<?php

use App\Http\Controllers\api\AnswerController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\ExerciseController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/allUsers',[UserController::class,'index']);
Route::delete('/deleteUser/{user}',[UserController::class,'destroy']);//
Route::post('/createUser',[UserController::class,'store']);
Route::put('/editUser/{user}',[UserController::class,'update']);
Route::get('/leaderboard/',[UserController::class,'leaderboard']);
//Exercises
Route::get('/exercise',[ExerciseController::class,'index']);
Route::post('/exercise',[ExerciseController::class,'store']);
Route::get('/exercise/{exercise}',[ExerciseController::class,'show']);
Route::put('/exercise/{exercise}',[ExerciseController::class,'update']);
Route::delete('/exercise/{exercise}',[ExerciseController::class,'destroy']);


Route::post('/answer',[AnswerController::class,'store']);
