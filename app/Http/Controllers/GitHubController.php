<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GitHubController extends Controller{
    public function redirectToProvider(){

        return Socialite::driver('github')->redirect();
    }

    public function handleCallback(){
        $oauth_user = Socialite::driver('github')->user();

        // Tries to create a user, but it will not if the user is already in DB
        try{
            $user = User::firstOrCreate([
                'name' => explode("-",$oauth_user->nickname)[0],
                'last_name' => explode("-",$oauth_user->nickname)[1],
                'email' => $oauth_user->email,
                'password' => null
            ]);
        }
        catch (\Exception $e){
            $user = User::whereEmail($oauth_user->email)->first();
        }
        // Log him in!
        \Auth::login($user,true);


        return redirect('/')->with('success',"Welcome back, bro");
    }
}
