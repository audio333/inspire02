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

		@if (count($events) > 0)
			<hr class="section-break">
			<h2 class="headline headline--medium">Upcoming {{ $program->title }} Events</h2>

			@foreach ($events as $event)
				<div class="event-summary">
					<a class="event-summary__date t-center" href="{{ route('events.show', $event->title) }}">
						<span class="event-summary__month">{{ $event->event_date->format('M') }}</span>
						<span class="event-summary__day">{{ $event->event_date->format('d') }}</span>
					</a>
					<div class="event-summary__content">
						<h5 class="event-summary__title headline headline--tiny"><a href="{{ route('events.show', $event->title) }}">{{ $event->title }}</a></h5>
						<p>{{ Str::words($event->content, 10) }}
							<a href="{{ route('events.show', $event->title) }}" class="nu gray">Learn more</a>
						</p>
					</div>
				</div>
			@endforeach
		@endif

	</div>
@endsection
