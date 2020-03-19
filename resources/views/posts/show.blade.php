@extends('layouts.master')

@section('title', $post->title)

@section('content')
	<x-page-banner
		:title="$post->title"
		:subtitle="$banner['subtitle']"
		:content="$banner['content']"
		style="background-image: url(images/bus.jpg)"
	>
	</x-page-banner>

	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p>
				<a class="metabox__blog-home-link" href="{{ route('posts.index') }}">
					<i class="fa fa-home" aria-hidden="true"></i> Blog Home
				</a>

				<span class="metabox__main">
					@include('includes.meta')
				</span>
			</p>
		</div>

		<div class="generic-content">{{ $post->content }}</div>
	</div>
@endsection
