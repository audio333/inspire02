@extends('layouts.master')

@section('title', 'Programs')

@section('content')
	<x-page-banner
		:title="$banner['title']"
		:subtitle="$banner['subtitle']"
		:image="'/images/page-banner.jpg'"
	>
	</x-page-banner>

	<div class="container container--narrow page-section">
		@if (count($programs) > 0)
			<ul class="link-list min-list">
				@foreach ($programs as $program)
						<li><a href="/programs/{{ $program->title }}">{{ $program->title }}</a></li>
				@endforeach
			</ul>
		@else
			<p>No programs found</p>
		@endif
	</div>
@endsection
