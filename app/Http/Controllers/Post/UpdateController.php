<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Requests\Post\UpdateRequest;

class UpdateController extends BaseController
{
	public function __invoke(Post $post, UpdateRequest $request)
	{
		$postInfo = $request->validated();
		$this->service->update($postInfo, $post);

		return redirect()->route('posts.show', $post->id);
	}
}
