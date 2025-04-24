<?php

namespace App\Services\Post;
use App\Models\Post;

class Service
{
	public function store(array $postInfo)
	{
		$tags = $postInfo['tags'];
		unset($postInfo['tags']);

		$post = Post::create($postInfo);
		$post->tags()->attach($tags);
	}

	public function update(array $postInfo, Post $post)
	{
		$tags = $postInfo['tags'];
		unset($postInfo['tags']);

		$post->update($postInfo);
		$post->tags()->sync($tags);
	}
}