@extends('pages.master')

@section('title',$title)

@section('content')
    <div class=" rounded-lg text-gray-300 overflow-hidden flex justify-center mx-4">
        <div class="max-w-4xl w-full w-4xl inline-block bg-gray-800 py-8 px-12 h-full flex flex-col justify-center">
            <h2 class="text-2xl mb-4 font-bold">{{ $title }}</h2>
            <form autocomplete="off" action="{{ url('/post',$post->id) }}" method="POST">
                @method('PATCH')
                {{ csrf_field() }}
                <input required autofocus class="input w-full" type="text" name="heading" id="heading" placeholder="Heading" value="{{ $post->heading }}">
                <textarea required placeholder="Text of the post" class="textarea" name="text" id="text" cols="30" rows="10">{{ $post->text }}</textarea>

                @if($tags)
                    <div class="py-2">
                        @foreach($tags as $tag)
                            <label class="px-4 py-2 inline-block">
                                <input name="tags[]" type="checkbox" value="{{ $tag->id }}" {{ in_array($tag->name,$post_tags) ? "checked" : "" }}>

                                {{ $tag->name }}
                            </label>
                        @endforeach
                    </div>
                @endif
                <button type="submit" class="button mt-4">Update</button>
            </form>
        </div>

    </div>
@stop
