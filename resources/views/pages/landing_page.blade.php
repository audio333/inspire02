@extends('layouts.master')

@section('title', 'My University')

@section('content')
	<div class="page-banner">
		<div class="page-banner__bg-image" style="background-image: url(images/library-hero.jpg);"></div>
		<div class="page-banner__content container t-center c-white">
			<h1 class="headline headline--large">Welcome!</h1>
			<h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
			<h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
			<a href="#" class="btn btn--large btn--blue">Find Your Major</a>
		</div>
	</div>

	<div class="full-width-split group">
		<div class="full-width-split__one">
			<div class="full-width-split__inner">
				<h2 class="headline headline--small-plus t-center">Upcoming Events</h2>

				@foreach ($events as $event)
					<div class="event-summary">
						<a class="event-summary__date t-center" href="{{ route('events.show', $event->id) }}">
							<span class="event-summary__month">{{ $event->event_date->format('M') }}</span>
							<span class="event-summary__day">{{ $event->event_date->format('d') }}</span>
						</a>
						<div class="event-summary__content">
							<h5 class="event-summary__title headline headline--tiny"><a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a></h5>
							<p>{{ Str::words($event->content, 10) }}
								<a href="{{ route('events.show', $event->id) }}" class="nu gray">Learn more</a>
							</p>
						</div>
					</div>
				@endforeach

				<p class="t-center no-margin"><a href="{{ route('events.index') }}" class="btn btn--blue">View All Events</a></p>
			</div>
		</div>
		<div class="full-width-split__two">
			<div class="full-width-split__inner">
				<h2 class="headline headline--small-plus t-center">From Our Blogs</h2>

				@foreach ($posts as $post)
					<div class="event-summary">
						<a class="event-summary__date event-summary__date--beige t-center" href="{{ route('posts.show', $post->id) }}">
							<span class="event-summary__month">{{ $post->created_at->format('M') }}</span>
							<span class="event-summary__day">{{ $post->created_at->format('d') }}</span>
						</a>
						<div class="event-summary__content">
							<h5 class="event-summary__title headline headline--tiny"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h5>
							<p>{{ Str::words($post->content, 10) }}
								<a href="{{ route('posts.show', $post->id) }}" class="nu gray">Read more</a>
							</p>
						</div>
					</div>
				@endforeach

				<p class="t-center no-margin"><a href="{{ route('posts.index') }}" class="btn btn--yellow">View All Blog Posts</a></p>
			</div>
		</div>
	</div>

	<hero-slider></hero-slider>

@endsection