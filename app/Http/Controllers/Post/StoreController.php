<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends BaseController
{
	public function __invoke(StoreRequest $request)
	{
		$postInfo = $request->validated();
		$this->service->store($postInfo);
		return redirect()->route('posts.index');
	}
}
