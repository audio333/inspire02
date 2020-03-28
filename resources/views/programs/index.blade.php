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
			<x-program :programs="$programs"></x-program>
		@else
			<p>No programs found</p>
		@endif
	</div>
@endsection
