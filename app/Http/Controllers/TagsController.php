<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TagsController extends Controller{

    public function show($id){
        $tag = Tag::findOrFail($id);

        return view('posts.index')
            ->withTitle($tag->name)
            ->withPosts($tag->posts()->paginate(2));
    }
}
