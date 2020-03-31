<template>
	<div></div>
</template>

<script>
export default {
	mounted() {
		this.handler = event => {
			if (event.key === 's') {
				this.$emit('openOverlay', event);
			}

			if (event.key === 'Escape') {
				this.$emit('closeOverlay', event);
			}
		}

		window.addEventListener('keyup', this.handler);
	},
	beforeDestroy() {
		window.removeEventListener('keyup', this.handler);
	}
}
</script>

<style scoped>
	div {
		display: none;
	}
</style>