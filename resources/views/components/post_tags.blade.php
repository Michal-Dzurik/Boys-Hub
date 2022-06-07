@if($post->tags)
    <div class="py-2">
        @foreach($post->tags as $tag)
            <a class="tag" href="{{ url("tag",$tag->id) }}">{{ $tag->name }}</a>
        @endforeach
    </div>
@endif
