<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use \App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
| OLD - Response->json()
|
| NEW - response()->json()
*/

Route::get('/', [PagesController::class, 'home']);

Route::get('/about', [PagesController::class, 'about']);

Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register',[RegisterController::class,'store']);

Route::get('/login', [LoginController::class, 'show']);
Route::post('/login',[LoginController::class,'store']);

Route::resource('/post', PostsController::class);

