@extends('layouts.master')

@section('title', 'Events')

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
			<a href="/events/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
				{{ $stats['month'] . ' ' . $stats['year'] }}
			</a>
		</li>
	@endforeach

	<div class="container container--narrow page-section">
		@if (count($events) > 0)
			@foreach ($events as $event)
				@include('events.event')
			@endforeach
			{{ $events->appends(request()->except('page'))->links() }}
		@else
			<p>No events found</p>
		@endif
	</div>
@endsection