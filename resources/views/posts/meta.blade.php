Posted by
	<a href="{{ route('posts.user', $post->user->name) }}">{{ $post->user->name }}</a>
on {{ $post->created_at->toFormattedDateString() }}
@if ($post->categories->count())
	in
	@foreach ($post->categories as $category)
		<a href="{{ route('posts.categories', $category->name) }}">{{ $category->name }}</a>
			@if (!$loop->last) , @endif
	@endforeach
@endif
