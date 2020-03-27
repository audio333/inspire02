@extends('layouts.master')

@section('title', 'Events')

@section('content')
	<x-page-banner
		:title="$banner['title']"
		:subtitle="$banner['subtitle']"
		:image="'/images/page-banner.jpg'"
	>
	</x-page-banner>

	<h3>By Month</h3>
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

			<hr class="section-break">

			<p>Looking for a recap of past events?
				<a href="{{ route('events.past') }}">Check out our past events archives.</a>
			</p>
		@else
			<p>No events found</p>
		@endif
	</div>
@endsection