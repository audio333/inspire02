@extends('layouts.master')

@section('title', $event->title)

@section('content')
	<x-page-banner
		:title="$event->title"
		:subtitle="$banner['subtitle']"
		:image="'/images/page-banner.jpg'"
	>
	</x-page-banner>

	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p>
				<a class="metabox__blog-home-link" href="{{ URL::previous() }}">
					<i class="fa fa-home" aria-hidden="true"></i> Events
				</a>

				<span class="metabox__main">
					{{ $event->title }}
				</span>
			</p>
		</div>

		<div class="generic-content">{{ $event->content }}</div>

		@if (count($programs) > 0)
			<hr class="section-break">
			<h2 class="headline headline--medium">Related Program(s)</h2>

			<x-program :programs="$programs"></x-program>
		@endif
	</div>
@endsection
