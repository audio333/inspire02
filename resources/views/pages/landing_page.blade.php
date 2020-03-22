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

				<div class="event-summary">
					<a class="event-summary__date t-center" href="#">
						<span class="event-summary__month">Mar</span>
						<span class="event-summary__day">25</span>
					</a>
					<div class="event-summary__content">
						<h5 class="event-summary__title headline headline--tiny"><a href="#">Poetry in the 100</a></h5>
						<p>Bring poems you&rsquo;ve wrote to the 100 building this Tuesday for an open mic and snacks. <a href="#" class="nu gray">Learn more</a></p>
					</div>
				</div>
				<div class="event-summary">
					<a class="event-summary__date t-center" href="#">
						<span class="event-summary__month">Apr</span>
						<span class="event-summary__day">02</span>
					</a>
					<div class="event-summary__content">
						<h5 class="event-summary__title headline headline--tiny"><a href="#">Quad Picnic Party</a></h5>
						<p>Live music, a taco truck and more can found in our third annual quad picnic day. <a href="#" class="nu gray">Learn more</a></p>
					</div>
				</div>

				<p class="t-center no-margin"><a href="#" class="btn btn--blue">View All Events</a></p>

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