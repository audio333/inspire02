@extends('layouts.master')

@section('title', 'Post')

@section('content')
	<x-page-banner
		:title="$banner['title']"
		:subtitle="$banner['subtitle']"
		:content="$banner['content']"
		style="background-image: url(images/bus.jpg)"
	>
	</x-page-banner>

	@if (count($posts) > 0)
		@foreach ($posts as $post)
			@include('posts.post')
		@endforeach
		{{ $posts->links() }}
	@else
		<p>No posts found</p>
	@endif
@endsection