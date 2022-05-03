@extends('pages.master')

@section('title','hello here some posts')

@section('content')
    <div class="text-left bg-gray-800 rounded-lg  w-full max-w-650 overflow-hidden p-2.5">
        <h1 class="text-white text-xl px-8 pt-2 pb-4 font-bold">Posts</h1>
        @forelse($posts as $post)
            <article class="rich-block rounded-md">
            <a href="{{ url("post/$post->id") }}" class="text-white px-8 py-6 block">
                <h1 class="font-bold text-yellow-500">{{ $post->heading }}</h1>
                <p class="text-gray-400">{{ substr($post->text,0,70) }}..</p>
                <time class="text-gray-500 font-normal text-sm">{{ $post->created_at }}</time>
            </a>
            </article>

        @empty
            Nothing here man :/
        @endforelse
    </div>
@stop
