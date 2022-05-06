@extends('pages.master')

@section('title',$user->name . " " . $user->last_name)

@section('content')
        <article class="text-left bg-gray-800 rounded-lg py-8 px-2 w-full max-w-650">
            <a href="#" class="text-white">
                <h1 class="font-bold border-b-4 border-yellow-500 text-xl pb-1 mx-8 mb-2.5"> <span class="text-gray-500 font-normal">Author -</span> {{ $user->name . " " . $user->last_name }}</h1>
                @forelse($user->posts as $post)
                    <article class="rich-block rounded-md mt-1">
                        <a href="{{ url("post",$post->id) }}" class="text-white px-8 py-6 block">
                            <h1 class="font-bold text-yellow-500">{{ $post->heading }}</h1>
                            <p class="text-gray-400">{{ $post->teaser }}..</p>
                            <time class="text-gray-500 font-normal text-sm">{{ $post->created_at }}</time>
                        </a>
                    </article>

                @empty
                    <p class="px-8 py-2">Nothing here man :/</p>
                @endforelse
            </a>
        </article>
@stop
