<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index(User $user)
	{
     $posts = $user->posts()->paginate(2);

     $banner = array(
         'title' => $user->name,
         'subtitle' => 'User Archive',
         'content' => '',
     );

     return view('posts.index', compact('banner', 'posts'));
	}
}
