<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function index()
	{
		$posts = Post::all();
		return view('posts', compact('posts'));
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

	public function firstOrCreate()
	{
		$result = Post::firstOrCreate(
			['title' => 'firstOrCreate title from php'],
			[
				'title' => 'firstOrCreate title from php',
				'content' => 'content firstOrCreate',
				'image' => 'img',
				'is_published' => 1,
				'likes' => 20
			]
		);

		dd($result);
	}

	public function updateOrCreate()
	{
		$result = Post::updateOrCreate(
			['title' => 'firstOrCreat1e title from php'],
			[
				'title' => 'updateOrCreate title from php',
				'content' => 'content Create',
				'image' => 'img',
				'is_published' => 0,
				'likes' => 20
			]
		);

		dd($result);
	}
}
