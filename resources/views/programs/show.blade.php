@extends('layouts.master')

@section('title', $program->title)

@section('content')
	<x-page-banner
		:title="$program->title"
		:subtitle="$banner['subtitle']"
		:content="$banner['content']"
		style="background-image: url(images/bus.jpg)"
	>
	</x-page-banner>

	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p>
				<a class="metabox__blog-home-link" href="{{ route('programs.index') }}">
					<i class="fa fa-home" aria-hidden="true"></i> All Programs
				</a>

				<span class="metabox__main">
					{{ $program->title }}
				</span>
			</p>
		</div>

		<div class="generic-content">{{ $program->content }}</div>
	</div>
@endsection
