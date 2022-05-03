<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller{

    public function show(){
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

        if (!$validator->fails()){
            return back()->withInput()->with('success','You have been registered successfully');
        }

        return back()->withErrors($validator)->withInput();

    }
}
