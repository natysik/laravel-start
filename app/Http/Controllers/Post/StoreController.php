<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class StoreController extends Controller
{
	public function __invoke()
	{
		$postInfo = request()->validate([
			'title' => 'required|string',
			'content' => 'string',
			'img' => 'string',
			'category_id' => 'integer',
			'tags' => ''
		]);

		$tags = $postInfo['tags'];
		unset($postInfo['tags']);

		$post = Post::create($postInfo);
		$post->tags()->attach($tags);

		return redirect()->route('posts.index');
	}
}
