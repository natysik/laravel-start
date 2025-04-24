<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Post\UpdateRequest;

class UpdateController extends Controller
{
	public function __invoke(Post $post, UpdateRequest $request)
	{
		$postInfo = $request->validated();

		$tags = $postInfo['tags'];
		unset($postInfo['tags']);

		$post->update($postInfo);
		$post->tags()->sync($tags);

		return redirect()->route('posts.show', $post->id);
	}
}
