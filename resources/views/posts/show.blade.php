@extends('pages.master')

@section('title',$post->heading)

@section('content')
        <article class="text-left bg-gray-800 rounded-lg p-8 w-full max-w-650">
            <a href="#" class="text-white">
                <h1 class="font-bold border-b-4 border-yellow-500 text-xl pb-1">{{ $post->heading }}</h1>
                <p class="text-gray-400 pt-4">{!! $post->richText !!}</p>

                <footer class="py-2.5">
                    <span class="text-gray-500">Created at </span><time>{{ $post->created_at }}</time>
                    <br>
                    <span class="text-gray-500">Created by </span> <a class="rich-link-light" href="{{ url("user",$post->user->id) }}">{{ $post->user->name . " " . $post->user->last_name }}</a>
                </footer>
            </a>
        </article>
@stop
