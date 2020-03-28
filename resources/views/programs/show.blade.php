@extends('layouts.master')

@section('title', $program->title)

@section('content')
	<x-page-banner
		:title="$program->title"
		:subtitle="$banner['subtitle']"
		:image="'/images/page-banner.jpg'"
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

		@if (count($professors) > 0)
			<hr class="section-break">
			<h2 class="headline headline--medium">{{ $program->title }} Professors</h2>

			<ul class="professor-cards">
				@foreach ($professors as $professor)
					<li class="professor-card__list-item">
						<a class="professor-card" href="{{ route('professors.show', $professor->title) }}">
							<img src="{{ $professor->getMedia('prof-avatars')->first()->getUrl('prof-landscape') }}" alt="avatar" class="professor-card__image">
							<span class="professor-card__name">{{ $professor->title }}</span>
						</a>
					</li>
				@endforeach
			</ul>
		@endif

		@if (count($events) > 0)
			<hr class="section-break">
			<h2 class="headline headline--medium">Upcoming {{ $program->title }} Events</h2>

			<x-event :events="$events"></x-event>
		@endif

	</div>
@endsection
