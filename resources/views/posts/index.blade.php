@extends('layouts.master')

@section('title', 'Post')

@section('content')
	<x-page-banner
		:title="$banner['title']"
		:subtitle="$banner['subtitle']"
		:image="'/images/page-banner.jpg'"
	>
	</x-page-banner>

	@include('includes.archive')

	<div class="container container--narrow page-section">
		@if (count($posts) > 0)
			@foreach ($posts as $post)
				@include('posts.post')
			@endforeach
			{{ $posts->appends(request()->except('page'))->links() }}
		@else
			<p>No posts found</p>
		@endif
	</div>
@endsection