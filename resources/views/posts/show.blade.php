@extends('pages.master')

@section('title',$post->heading)



@section('content')
        <article class="relative text-left bg-gray-800 rounded-lg p-8 w-full max-w-650">
            @can('edit-post',$post)
                <div class="absolute bottom-full right-2">
                    <a class="inline-block text-white bg-gray-600 px-2 py-1 rounded-t-md" href="{{ route('post.edit',$post->id) }}">Edit post</a>
                    <form class="inline-block " action="{{ route('post.destroy',$post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="text-white bg-red-600 px-2 py-1 rounded-t-md">Delete post</button>
                    </form>
                </div>

            @endcan
            <a href="#" class="text-white">
                <h1 class="font-bold border-b-4 border-yellow-500 text-xl pb-1">{{ $post->heading }}</h1>
                <p class="text-gray-400 pt-4">{!! $post->richText !!}</p>

                <footer class="py-2.5">
                    @include("components.post_tags")
                    <span class="text-gray-500">Created at </span><time class="text-gray-500">{{ $post->created_at }}</time>
                    <br>
                    <span class="text-gray-500">Created by </span> <a class="rich-link-light" href="{{ url("user",$post->user_id) }}">{{ $post->user->name . " " . $post->user->last_name }}</a>
                </footer>
            </a>
        </article>
@stop
