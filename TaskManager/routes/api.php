<?php

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
use App\Http\Controllers\Api\TaskController;
Route::get('/task',[TaskController::class,'index']);
Route::post('/task',[TaskController::class,'store']);
Route::patch('/task/{task}',[TaskController::class,'update']);
Route::delete('/task/{task}',[TaskController::class,'destroy']);
Route::get('/task/{task}',[TaskController::class,'show']);
