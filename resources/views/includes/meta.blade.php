Posted by
	{{-- <a href="#">{{ $post->user->name }}</a> --}}
on {{ $post->created_at->toFormattedDateString() }}
@if ($post->categories->count())
	in
	@foreach ($post->categories as $category)
		<a href="/posts/categories/{{ $category->name }}">{{ $category->name }}</a>
			@if (!$loop->last) , @endif
	@endforeach
@endif
