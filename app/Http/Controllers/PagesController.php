<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function home() {
		return view('pages.landing-page');
	}

	public function aboutUs() {
		return view('pages.about-us', [
			'title' => 'About Us',
			'content' => 'This is the about us page',
		]);
	}

	public function privacyPolicy() {
		return view('pages.privacy-policy', [
			'title' => 'Privacy Policy',
			'content' => 'This is the privacy content.',
		]);
	}
}
