<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller{

    public function show(){
        if (Auth::check()) {
            return view('posts.index')->withPosts(Post::paginate(15))->withTitle("OK");
        }
        return view('pages.login');
    }

    public function check(Request $request){

        $params = $request->all();

        $validator = Validator::make($params,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        /*$user = new User();
        $user->email = $params['email'];
        $user->password = bcrypt($params['password']);

        Auth::login($user);*/

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        if ($this->attemptLogin($request)) {
            return redirect("post")
                ->withSuccess('Signed in');
        }

        return back()->withInput()->withErrors(['Email or password is wrong']);

    }

    protected function attemptLogin(Request $request){
        return Auth::attempt(
            $request->only('email','password')
        );
    }

    public function destroy(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/login");
    }

    // TODO - make logout
}
