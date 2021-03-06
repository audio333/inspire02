<?php

namespace App;

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function categories()
	{
		return $this->belongsToMany(Category::class);
	}

	// public function scopeFilter($query, $filters)
	// {
	// 	if ($month = $filters['month']) {
	// 		$query->whereMonth('created_at', Carbon::parse($month)->month);
	// 	}

	// 	if ($year = $filters['year']) {
	// 		$query->whereYear('created_at', $year);
	// 	}
	// }

	public static function archives()
	{
		return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
		            ->groupBy('year', 'month')
		            ->orderByRaw('min(created_at) desc')
		            ->get()
		            ->toArray();
	}
}
