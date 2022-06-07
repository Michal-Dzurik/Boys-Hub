<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller{
    public function home() {
        if (Auth::check()){
            $posts = Post::all();

            return view('posts.index')
                ->withTitle('Check the posts')
                ->withPosts($posts);
        }
        else return view('pages.home');
    }

    public function about() {
        return view('pages.about');
    }


}
