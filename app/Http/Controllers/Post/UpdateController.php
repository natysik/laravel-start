<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class UpdateController extends Controller
{
	public function __invoke(Post $post)
	{
		$postInfo = request()->validate([
			'title' => 'string',
			'content' => 'string',
			'img' => 'string',
			'category_id' => 'integer',
			'tags' => ''
		]);

		$tags = $postInfo['tags'];
		unset($postInfo['tags']);

		$post->update($postInfo);
		$post->tags()->sync($tags);

		return redirect()->route('posts.show', $post->id);
	}
}
