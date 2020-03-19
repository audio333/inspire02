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

	@foreach ($posts as $post)
		<div class="container container--narrow page-section">
			<div class="post-item">
				<h2 class="headline headline--medium headline--post-title"><a href="#">{{ $post->title }}</a></h2>

				<div class="metabox">
					<p>Posted by Brad on 3.18.20 in News</p>
				</div>

				<div class="generic-content">
					<p>{{ $post->content }}</p>
					<p><a class="btn btn--blue" href="#">Continue reading &raquo;</a></p>
				</div>
			</div>
		</div>
	@endforeach
@endsection