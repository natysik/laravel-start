<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function index()
	{
		$posts = Post::where('is_published', 1)->get();
		return $posts;
	}

	public function create()
	{
	$postsArr = [
		[
			'title' => 'title from php',
			'content' => 'content from php',
			'image' => 'img',
			'is_published' => 1,
			'likes' => 25
		],
		[
			'title' => 'second title from php',
			'content' => 'content from php',
			'image' => 'img',
			'is_published' => 1,
			'likes' => 2
		]
	];

		foreach($postsArr as $post) {
			Post::create($post);
		}
	}

	public function update()
	{
		$post = Post::find(3);
		$post->update([
			'title' => 'updated from php'
		]);
	}

	public function delete()
	{
		$post = Post::withTrashed()->find(1);
		$post->restore();
	}
}
