		<header class="site-header">
			<div class="container">
				<h1 class="school-logo-text float-left"><a href="{{ route('landing') }}"><strong>Fictional</strong> University</a></h1>
				<span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
				<i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
				<div class="site-header__menu group">
					<nav class="main-navigation">
						<ul>
							<li><a href="{{ route('about') }}">About Us</a></li>
							<li><a href="{{ route('programs.index') }}">Programs</a></li>
							<li><a href="{{ route('events.index') }}">Events</a></li>
							<li><a href="#">Campuses</a></li>
							<li><a href="{{ route('posts.index') }}">Blog</a></li>
						</ul>
					</nav>
					<div class="site-header__util">
						<a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
						<a href="#" class="btn btn--small  btn--dark-orange float-left">Sign Up</a>
						<span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
					</div>
				</div>
			</div>
		</header>
