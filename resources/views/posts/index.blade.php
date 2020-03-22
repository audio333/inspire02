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

	<h3>Archives</h3>
	@foreach ($archives as $stats)
		<li>
			<a href="/posts/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
				{{ $stats['month'] . ' ' . $stats['year'] }}
			</a>
		</li>
	@endforeach

	@if (count($posts) > 0)
		@foreach ($posts as $post)
			@include('posts.post')
		@endforeach
		{{ $posts->appends(request()->except('page'))->links() }}
	@else
		<p>No posts found</p>
	@endif
@endsection