<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller{

    public function show(){
        return view('pages.login');
    }

    public function store(Request $request){

        $params = $request->all();

        $validator = Validator::make($params,[
            'email' => 'required|email',
            'password' => 'required|'
        ]);

        if (!$validator->fails()){
            return back()->withInput()->with('success','You have been logged in successfully');
        }

        return back()->withErrors($validator)->withInput();

    }
}
