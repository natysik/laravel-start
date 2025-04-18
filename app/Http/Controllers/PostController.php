<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function index()
	{
		$posts = Post::all();
		return view('post.index', compact('posts'));
	}

	public function create()
	{
		return view('post.create');
	}

	public function store()
	{
		$postInfo = request()->validate([
			'title' => 'string',
			'content' => 'string',
			'image' => 'string'
		]);

		Post::create($postInfo);
		return redirect()->route('posts.index');
	}

	public function show(Post $post)
	{
		return view('post.show', compact('post'));
	}

	public function edit(Post $post)
	{
		return view('post.edit', compact('post'));
	}

	public function update(Post $post)
	{
		$postInfo = request()->validate([
			'title' => 'string',
			'content' => 'string',
			'image' => 'string'
		]);

		$post->update($postInfo);
		return redirect()->route('posts.show', $post->id);
	}

	public function destroy(Post $post)
	{
		$post->delete();
		return redirect()->route('posts.index');
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
