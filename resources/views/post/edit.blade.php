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

			<div class="mb-3">
				<label class="form-label">Tag</label>
				@foreach($tags as $tag)
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="{{ $tag->id }}" name="tags[]"
						@foreach ($post->tags as $postTag)
							{{ $postTag->id == $tag->id ? ' checked' : '' }}
						@endforeach
						>
						<label class="form-check-label" for="{{ $tag->id }}">
							{{ $tag->title }}
						</label>
					</div>
				@endforeach
			</div>

			<button type="submit" class="btn btn-primary">Save post</button>
		</form>
	</div>
@endsection