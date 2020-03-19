<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function home() {
		return view('pages.landing-page');
	}

	public function aboutUs() {
		$banner = array(
			'title' => 'About Us',
			'subtitle' => '',
			'content' => 'This is the about us page',
		);

		return view('pages.about-us', compact('banner'));
	}

	public function privacyPolicy() {
		$banner = array(
			'title' => 'Privacy Policy',
			'subtitle' => '',
			'content' => 'This is the privacy content.',
		);

		return view('pages.privacy-policy', compact('banner'));
	}
}
