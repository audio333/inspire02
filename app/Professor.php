<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Package
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Professor extends Model implements HasMedia
{
	use HasMediaTrait;

	protected $guarded = [];

	public function programs()
	{
		return $this->belongsToMany(Program::class);
	}

	public function registerMediaConversions(Media $media = null)
	{
		$this->addMediaConversion('thumb')
			->width(100)
			->height(100)
			->greyscale();
	}
}
