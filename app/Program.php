<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
	public function events()
	{
		return $this->belongsToMany(Event::class);
	}

	public function professors()
	{
		return $this->belongsToMany(Professor::class);
	}
}
