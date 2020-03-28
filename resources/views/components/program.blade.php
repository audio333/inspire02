<div>
	<ul class="link-list min-list">
		@foreach ($programs as $program)
			<li>
				<a href="{{ route('programs.show', $program->title) }}">{{ $program->title }}</a>
			</li>
		@endforeach
	</ul>
</div>