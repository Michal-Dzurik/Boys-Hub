<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use \App\Http\Controllers\PostsController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\TagsController;

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

Route::get('/', [PostsController::class,'index'])->name('home');


Route::get('/about', [PagesController::class, 'about'])->name('about');

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login',[LoginController::class,'check']);
Route::get('/logout', [LoginController::class, 'destroy']);

Route::resource('/post', PostsController::class);
Route::put('post/{id}',[PostsController::class,'update']);

Route::get("/user/",[UserController::class,'index'])->name('user');
Route::get("/user/{id}",[UserController::class,'show']);

Route::get("/tag/{id}",[TagsController::class,'show'])->name('tag');

Route::get("easter/egg/",["middleware" => 'admin',function(){
    return "I Love Samko Drotár <3";
}]);

// OAUTH2
Route::get('auth/github/',[\App\Http\Controllers\GitHubController::class,"redirectToProvider"])->name("github");
Route::get('auth/github/callback',[\App\Http\Controllers\GitHubController::class,"handleCallback"]);

Route::get('lang/{lang}', function ($lang){
    //dd(session()->get('lang'));

    if (array_key_exists($lang,Config::get('language'))){
        session()->put(['lang' => $lang]);
    }

    return redirect("/login");
});


