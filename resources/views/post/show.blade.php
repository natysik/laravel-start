@extends('layouts.main')

@section('content')
	<div>
		<form method="post" action="{{ route('posts.destroy', $post->id) }}">
			@csrf
			@method('delete')
			<input type="submit" value="Delete" class="btn btn-danger">
		</form>
	</div>

	<div>
		<div>
			<b>{{ $post->title }}</b>
		</div>
		<div>{{ $post->content }}</div>
	</div>

	<div><a href="{{ route('posts.edit', $post->id) }}">Edit</a></div>
	<div><a href="{{ route('posts.index') }}">Back</a></div>
@endsection