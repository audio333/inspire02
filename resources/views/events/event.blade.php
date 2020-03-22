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
