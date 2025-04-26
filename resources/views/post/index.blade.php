@extends('layouts.main')

@section('content')
<div>
    <div><a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Add post</a></div>

    <div class="mb-3">
        @foreach($posts as $post)
            <div>
                <a href="{{ route('posts.show', $post->id) }}"> {{ $post->id }}. {{ $post->title }} </a>
            </div>
        @endforeach
    </div>

    <div>
        {{ $posts->links() }}
    </div>
</div>
@endsection