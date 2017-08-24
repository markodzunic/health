<!-- SRIPTS -->

	<!-- jQUERY -->
	<script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- BOOTSTRAP JS -->
	<script src="{{ URL::asset('/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('/plugins/bootstrap/js/Moment.js') }}"></script>
	<script src="{{ URL::asset('/plugins/bootstrap/js/bootstrap-datetimepicker.min.js') }}"></script>
	<script src='https://js.stripe.com/v2/' type='text/javascript'></script>
	<script src="{{ URL::asset('/js/Admin/app.js') }}"></script>
	<script type="text/javascript">
		$('#collapse-sidebar').on('click', function (e) {
			e.preventDefault();
			$('#wrapper').toggleClass('im-expande');
		})
		$('.side-nav').on('show.bs.collapse', function () {
		    var actives = $(this).find('.collapse.in'),
		        hasData;

		    if (actives && actives.length) {
		        hasData = actives.data('collapse')
		        if (hasData && hasData.transitioning) return
		        actives.collapse('hide')
		        hasData || actives.data('collapse', null)
		    }
		});
		$(document).ready(function() {
			var getPage = $('.admin-title-section .col-md-12 a:last-child').text();

			var activeItem = $('.side-nav a').filter(function(index) {
				return $(this).text() === getPage;
			});

			if (activeItem.parent().parent().hasClass('collapse')) {
				activeItem.parent().addClass('im-open');
				activeItem.parent().parent().parent().addClass('im-open');
				activeItem.parent().parent().collapse('show');
			} else {
				activeItem.parent().addClass('im-open');
			}
		});
		function headerSearch () {
	    	var heightSection = $(window).height();
	    	var heightContainer = $('#im-search-form .navbar-form').height();
	    	var newHeight = (heightSection - heightContainer)/2;

	    	$('#im-search-form .navbar-form').css('margin-top', newHeight);
	    }
	    $(document).ready(function() {
	      headerSearch ();
	      $('#im-search-toggle, #im-search-form .im-close').on('click', function(e) {
	      	e.preventDefault();
	      	$('#im-search-form').toggle('300');
	      })
		});
		$( window ).resize(function() {
		  headerSearch ();
		});
	</script>
