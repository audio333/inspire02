@extends('layouts.master')

@section('title', 'Past Events')

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
			<a href="/past-events/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
				{{ $stats['month'] . ' ' . $stats['year'] }}
			</a>
		</li>
	@endforeach

	<div class="container container--narrow page-section">
		@if (count($events) > 0)
			<x-event :events="$events"></x-event>
			{{ $events->appends(request()->except('page'))->links() }}

			<hr class="section-break">

			<p>Looking for upcoming events?
				<a href="{{ route('events.index') }}">Check out our upcoming events.</a>
			</p>
		@else
			<p>No events found</p>
		@endif
	</div>
@endsection
