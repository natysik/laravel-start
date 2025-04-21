<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagsTable extends Migration
{
	 /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_tags', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('post_id');
			$table->unsignedBigInteger('tag_id');
			$table->timestamps();

			$table->foreign('post_id', 'post_tags_post_fk')->references('id')->on('posts');
			$table->foreign('tag_id', 'post_tags_tag_fk')->references('id')->on('tags');
		});
	}

	 /**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('post_tags');
	}
}
