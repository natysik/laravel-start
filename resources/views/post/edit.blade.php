@extends('layouts.main')

@section('content')
	<div>
		<form method="post" action="{{ route('posts.update', $post->id) }}">
			@csrf
			@method('patch')
			<div class="mb-3">
				<label for="title" class="form-label">Title</label>
				<input type="text" name="title" class="form-control" id="title" aria-describedby="Title" value={{ $post->title }}>
			</div>
			<div class="mb-3">
				<label for="content" class="form-label">Content</label>
				<textarea name="content" class="form-control" id="content" aria-describedby="Content">{{ $post->content }}</textarea>
			</div>
			<div class="mb-3">
				<label for="image" class="form-label">Image</label>
				<input type="text" name="image" class="form-control" id="image" aria-describedby="Image" value="{{ $post->image }}">
			</div>

			<div class="mb-3">
				<label for="category_id" class="form-label">Category</label>
				<select class="form-select" aria-label="Select category" name="category_id">
					@foreach($categories as $category)
						<option {{ $category->id == $post->category_id ? ' selected' : '' }}
								value="{{ $category->id }}" > {{ $category->title }}</option>
					@endforeach
				</select>
			</div>

			<button type="submit" class="btn btn-primary">Save post</button>
		</form>
	</div>
@endsection