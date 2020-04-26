

	</div>

@auth
	<script>
		window.user = @json(
		[
			'user'=> auth()->user()->load('notifications'),
			'roles'=>auth()->user()->roles,
			'permissions'=> auth()->user()->getAllPermissions()
		]
		);
	</script>
@endauth

<script src="{{ mix('/js/app.js') }}"></script>

</body>
</html>
