@extends('layouts.main')

@section('content')
	<div>
		<form method="post" action="{{ route('posts.store') }}">
			@csrf
			<div class="mb-3">
				<label for="title" class="form-label">Title</label>
				<input type="text" name="title" class="form-control" id="title" aria-describedby="Title" value="{{ old('title') }}">

				@error('title')
				<p class="text-danger">{{ $message }}</p>
				@enderror
			</div>

			<div class="mb-3">
				<label for="content" class="form-label">Content</label>
				<textarea name="content" class="form-control" id="content" aria-describedby="Content">{{ old('content') }}</textarea>

				@error('content')
				<p class="text-danger">{{ $message }}</p>
				@enderror
			</div>

			<div class="mb-3">
				<label for="image" class="form-label">Image</label>
				<input type="text" name="image" class="form-control" id="image" aria-describedby="Image" value="{{ old('image') }}">

				@error('image')
				<p class="text-danger">{{ $message }}</p>
				@enderror
			</div>

			<select class="form-select mb-3" aria-label="Select category" name="category_id">
				<label class="form-label">Category</label>
				@foreach($categories as $category)
					<option value="{{ $category->id }}"
						{{ old('category_id') == $category->id ? ' selected' : '' }}
					> {{ $category->title }}</option>
				@endforeach
			</select>

			<div class="mb-3">
				<label class="form-label">Tag</label>
				@foreach($tags as $tag)
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="{{ $tag->id }}" name="tags[]">
						<label class="form-check-label" for="{{ $tag->id }}">
							{{ $tag->title }}
						</label>
					</div>
				@endforeach
			</div>

			<button type="submit" class="btn btn-primary">Add post</button>
		</form>
	</div>
@endsection