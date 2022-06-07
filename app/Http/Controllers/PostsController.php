<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(2);

        return view('posts.index')
            ->withTitle('Posts')
            ->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        if (Auth::check()){
            return view('posts.create')
                ->withTags(Tag::all())
                ->withTitle('Add new post');
        }
        return redirect()->route('login')->withErrors(['You need to be logged in to create the post']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        // Here you can create your own type of request and not do those things in here
        $params = $request->all();

        if (Auth::check()){
            $post = Auth::user()->posts()->create( $params );
            $post->tags()->sync( $request->get('tags') ?: []);
            return redirect()->route("post.show",$post->id);
        }

        return redirect()->route('login')->withErrors(['You need to be logged in to create the post']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $post = Post::findOrFail($id);
        $post->user()->get();
        if ($post == null) abort('404');
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $post = Post::findOrFail($id);

        if (!Auth::check()){
            return back()->withErrors(['You aren\'t logged in']);
        }

        $this->authorize('edit-post',$post);

        $post_tags = array();

        foreach($post->tags as $item){
            array_push($post_tags,$item->name);
        }

        $tags = Tag::all();
        return view('posts.edit')
            ->with('post_tags',$post_tags)
            ->withPost($post)
            ->withTags($tags)
            ->withTitle("Edit that shot");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id){
        $post = Post::findOrFail($id);

        if (!Auth::check()){
            return back()->withErrors(['You aren\'t logged in']);
        }

        $this->authorize('edit-post',$post);

        $post->update( $request->all() );

        $post->tags()->sync( $request->get('tags') ?: []);

        return redirect()->route("post.show",$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index')
            ->withPosts(Post::all())
            ->withTitle('Posts');
    }
}
