<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{
	Model,
	SoftDeletes
};

class Post extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'posts';
	//Для возможности добавление данных в таблицу $table
	protected $guarded = [];
}
