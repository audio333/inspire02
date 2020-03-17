<template>
	<div class="hero-slider">
		<Slick ref="slick" :options="slickOptions">
			<div class="hero-slider__slide" style="background-image: url(images/bus.jpg);">
				<div class="hero-slider__interior container">
					<div class="hero-slider__overlay">
						<h2 class="headline headline--medium t-center">Free Transportation</h2>
						<p class="t-center">All students have free unlimited bus fare.</p>
						<p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
					</div>
				</div>
			</div>
			<div class="hero-slider__slide" style="background-image: url(images/apples.jpg);">
				<div class="hero-slider__interior container">
					<div class="hero-slider__overlay">
						<h2 class="headline headline--medium t-center">An Apple a Day</h2>
						<p class="t-center">Our dentistry program recommends eating apples.</p>
						<p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
					</div>
				</div>
			</div>
			<div class="hero-slider__slide" style="background-image: url(images/bread.jpg);">
				<div class="hero-slider__interior container">
					<div class="hero-slider__overlay">
						<h2 class="headline headline--medium t-center">Free Food</h2>
						<p class="t-center">Fictional University offers lunch plans for those in need.</p>
						<p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
					</div>
				</div>
			</div>
		</Slick>
	</div>
</template>

<script>
	import Slick from 'vue-slick';

	export default {
		components: { Slick },
		data() {
	        return {
	            slickOptions: {
	                slidesToShow: 1,
	                autoplay: true,
	                arrows: false,
	                dots: true,
	                // Any other options that can be got from plugin documentation
	            },
	        };
	    },
		mounted() {
			console.log('Slider mounted.')
		}
	}
</script>
