<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller{

    public function show($id){
        $user = User::findOrFail($id);

        return view('user.show')->withUser($user);
    }

    public function index(){
        if (Auth::check()){
            $user = User::findOrFail(Auth::id());
            return view('user.show')->withUser($user);
        }
        else {
            return view('user.show');
        }

    }

}
