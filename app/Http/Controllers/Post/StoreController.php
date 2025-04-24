<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends Controller
{
	public function __invoke(StoreRequest $request)
	{
		$postInfo = $request->validated();

		$tags = $postInfo['tags'];
		unset($postInfo['tags']);

		$post = Post::create($postInfo);
		$post->tags()->attach($tags);

		return redirect()->route('posts.index');
	}
}
