<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller{

    public function show(){
        if (Auth::check()){
            $posts = Post::all();

            return view('posts.index')->withPosts($posts);
        }
        return view('pages.register');
    }

    public function store(Request $request){
        $params = $request->all();

        $validator = Validator::make($params,[
            'name' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'password' => 'required|'
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();

        }

        try {
            $user = User::create([
                'name' => $params['name'],
                'last_name' => $params['lastName'],
                'email' => $params['email'],
                'password' => $params['password']
            ]);

            auth()->login($user);
        }catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return back()->withErrors(["message" => "User exists"])->withInput();
            }
        }


        return back()->withInput()->with('success','You have been registered successfully');



    }
}
