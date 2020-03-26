<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Package
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\File;

class Professor extends Model implements HasMedia
{
	use HasMediaTrait;

	protected $guarded = [];

	public function programs()
	{
		return $this->belongsToMany(Program::class);
	}

	public function registerMediaCollections()
	{
	    $this->addMediaCollection('prof-avatars')
	         ->useFallbackUrl('/images/prof-avatar.png')
	         ->useFallbackPath(public_path('/images/prof-avatar.png'))
	         ->singleFile()
	         ->acceptsMimeTypes(['image/jpeg', 'image/png']);

	    $this->addMediaCollection('page-banners')
	         ->useFallbackUrl('/images/page-banner.png')
	         ->useFallbackPath(public_path('/images/page-banner.png'))
	         ->singleFile()
	         ->acceptsMimeTypes(['image/jpeg', 'image/png']);
	}

	public function registerMediaConversions(Media $media = null)
	{
		// Professor
		$this->addMediaConversion('prof-portrait')
			->width(480)
			->height(650)
			->performOnCollections('prof-avatars');

		$this->addMediaConversion('prof-landscape')
			->width(400)
			->height(260)
			->performOnCollections('prof-avatars');

		// Page Banners
		$this->addMediaConversion('page-banner')
			->width(1500)
			->height(350)
			->performOnCollections('page-banners');
	}
}
