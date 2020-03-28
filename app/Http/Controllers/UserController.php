<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index(User $user)
	{
		$banner = array(
			'title' => $user->name,
			'subtitle' => 'User Archive',
		);

		$posts = $user->posts();

		if ($month = request('month')) {
			$posts->whereMonth('created_at', Carbon::parse($month)->month);
		}

		if ($year = request('year')) {
			$posts->whereYear('created_at', $year);
		}

		$posts = $posts->paginate(5);

		return view('posts.index', compact('banner', 'posts'));
	}
}
