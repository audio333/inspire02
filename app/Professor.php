<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
	public function programs()
	{
		return $this->belongsToMany(Program::class);
	}
}
