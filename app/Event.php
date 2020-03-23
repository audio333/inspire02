<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['event_date'];

	public function programs()
	{
		return $this->belongsToMany(Program::class);
	}
}
