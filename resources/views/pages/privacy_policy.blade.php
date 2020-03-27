@extends('layouts.master')

@section('title', 'Privacy Policy')

@section('content')
	<x-page-banner
		:title="$banner['title']"
		:subtitle="$banner['subtitle']"
		:image="'/images/page-banner.jpg'"
	>
	</x-page-banner>
	<div class="container container--narrow page-section">
		{{ $content }}
	</div>
@endsection