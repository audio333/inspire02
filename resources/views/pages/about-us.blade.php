@extends('layouts.master')

@section('title', 'About Us')

@section('content')
	<x-page-banner
		:title="$title"
		:content="$content"
		style="background-image: url(images/bus.jpg)"
	>
	</x-page-banner>
@endsection