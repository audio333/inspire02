<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
	public function home() {
		$posts = Post::latest()
			->take(2)
			->get();

		return view('pages.landing_page', compact('posts'));
	}

	public function aboutUs() {
		$banner = array(
			'title' => 'About Us',
			'subtitle' => '',
			'content' => 'This is the about us page',
		);

		return view('pages.about_us', compact('banner'));
	}

	public function privacyPolicy() {
		$banner = array(
			'title' => 'Privacy Policy',
			'subtitle' => '',
			'content' => 'This is the privacy content.',
		);

		return view('pages.privacy_policy', compact('banner'));
	}
}
