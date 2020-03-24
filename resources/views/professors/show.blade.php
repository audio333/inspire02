@extends('layouts.master')

@section('title', $professor->title)

@section('content')
	<x-page-banner
		:title="$professor->title"
		:subtitle="$banner['subtitle']"
		:content="$banner['content']"
		style="background-image: url(images/bus.jpg)"
	>
	</x-page-banner>

	<div class="container container--narrow page-section">

		<div class="generic-content">{{ $professor->content }}</div>

		@if (count($programs) > 0)
			<hr class="section-break">
			<h2 class="headline headline--medium">Subject(s) Taught</h2>
			<ul class="link-list min-list">
				@foreach ($programs as $program)
					<li>
						<a href="{{ route('programs.show', $program->title) }}">{{ $program->title }}</a>
					</li>
				@endforeach
			</ul>
		@endif

	</div>
@endsection
