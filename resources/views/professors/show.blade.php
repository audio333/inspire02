@extends('layouts.master')

@section('title', $professor->title)

@section('content')
	<x-page-banner
		:title="$banner['title']"
		:subtitle="$banner['subtitle']"
		:image="$pageBanners->first()->getUrl('page-banner')"
	>
	</x-page-banner>

	<div class="container container--narrow page-section">

		<div class="generic-content">
			<div class="row group">
				<div class="one-third">
					<img src="{{ $avatars->first()->getUrl('prof-portrait') }}" alt="image">
				</div>
				<div class="two-thirds">
					{{ $professor->content }}
				</div>
			</div>
		</div>

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
