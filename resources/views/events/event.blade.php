				<div class="event-summary">
					<a class="event-summary__date t-center" href="{{ route('events.show', $event->title) }}">
						<span class="event-summary__month">{{ $event->event_date->format('M') }}</span>
						<span class="event-summary__day">{{ $event->event_date->format('d') }}</span>
					</a>
					<div class="event-summary__content">
						<h5 class="event-summary__title headline headline--tiny">
							<a href="{{ route('events.show', $event->title) }}">{{ $event->title }}</a>
						</h5>
						<p>{{ Str::words($event->content, 10) }}
							<a href="{{ route('events.show', $event->title) }}" class="nu gray">Learn more</a>
						</p>
					</div>
				</div>
