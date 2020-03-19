@extends('layouts.master')

@section('title', 'Privacy Policy')

@section('content')
	<x-page-banner
		:title="$banner['title']"
		:subtitle="$banner['subtitle']"
		:content="$banner['content']"
		style="background-image: url(images/library-hero.jpg)"
	>
	</x-page-banner>
@endsection