Posted by {{ $post->user->name }}
on {{ $post->created_at->toFormattedDateString() }}
@if ($post->categories->count())
	in
	@foreach ($post->categories as $category)
		{{ $category->name }}
			@if (!$loop->last) , @endif
	@endforeach
@endif
