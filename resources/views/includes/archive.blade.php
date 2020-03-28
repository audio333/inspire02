	<h3>Archives</h3>
	@foreach ($archives as $stats)
		<li>
			<a href="/posts/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
				{{ $stats['month'] . ' ' . $stats['year'] }}
			</a>
		</li>
	@endforeach
