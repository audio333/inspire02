<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Resources\PostCollection;
use Illuminate\Http\Request;

class ApiController extends Controller
{
	public function posts()
	{
     return new PostCollection(Post::all());
	}
}
