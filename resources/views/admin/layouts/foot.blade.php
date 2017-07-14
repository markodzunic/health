<!-- SRIPTS -->

	<!-- jQUERY -->
	<script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- BOOTSTRAP JS -->
	<script src="{{ URL::asset('/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('/plugins/bootstrap/js/Moment.js') }}"></script>
	<script src="{{ URL::asset('/plugins/bootstrap/js/bootstrap-datetimepicker.min.js') }}"></script>
	<script src="{{ URL::asset('/js/Admin/app.js') }}"></script>
	<script type="text/javascript">
		$('#collapse-sidebar').on('click', function (e) {
			e.preventDefault();
			$('#wrapper').toggleClass('im-expande');
		})
	</script>
