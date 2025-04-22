@extends('layouts.main')

@section('content')
	<div>
		<form method="post" action="{{ route('posts.store') }}">
			@csrf
			<div class="mb-3">
				<label for="title" class="form-label">Title</label>
				<input type="text" name="title" class="form-control" id="title" aria-describedby="Title">
			</div>
			<div class="mb-3">
				<label for="content" class="form-label">Content</label>
				<textarea name="content" class="form-control" id="content" aria-describedby="Content"></textarea>
			</div>
			<div class="mb-3">
				<label for="image" class="form-label">Image</label>
				<input type="text" name="image" class="form-control" id="image" aria-describedby="Image">
			</div>

			<select class="form-select mb-3" aria-label="Select category" name="category_id">
				@foreach($categories as $category)
					<option value="{{ $category->id }}"> {{ $category->title }}</option>
				@endforeach
			</select>

			<button type="submit" class="btn btn-primary">Add post</button>
		</form>
	</div>
@endsection