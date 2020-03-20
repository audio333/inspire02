			<div class="container container--narrow page-section">
				<div class="post-item">
					<h2 class="headline headline--medium headline--post-title">
						<a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
					</h2>

					<div class="metabox">
						<p>
							@include('includes.meta')
						</p>
					</div>

					<div class="generic-content">
						<p>{{ $post->content }}</p>
						<p><a class="btn btn--blue" href="/posts/{{ $post->id }}">Continue reading &raquo;</a></p>
					</div>
				</div>
			</div>
