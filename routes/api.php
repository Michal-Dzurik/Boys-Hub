<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('posts/',[\App\Http\Controllers\api\PostController::class,"showAll"]);
Route::get('posts/{id}',[\App\Http\Controllers\api\PostController::class,"selectById"]);

Route::get('users/',[\App\Http\Controllers\api\UserController::class,"showAll"]);
Route::get('users/{id}',[\App\Http\Controllers\api\UserController::class,"selectById"]);
Route::post('users/create/',[\App\Http\Controllers\api\UserController::class,"store"]);
