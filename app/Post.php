<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function categories()
	{
		return $this->hasMany(Category::class);
	}
}
