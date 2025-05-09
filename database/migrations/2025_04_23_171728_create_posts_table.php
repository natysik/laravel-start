<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
	 /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function (Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('content');
			$table->string('img')->nullable();
			$table->integer('likes')->default(0);
			$table->boolean('is_published')->default(true);
			$table->unsignedBigInteger('category_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	 /**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('posts');
	}
}
