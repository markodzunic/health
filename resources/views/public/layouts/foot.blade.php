<!-- SRIPTS -->

	<!-- jQUERY -->
	<script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- BOOTSTRAP JS -->
	<script src="{{ URL::asset('/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- SMOOTH SCROLL  -->
	<script src="{{ URL::asset('/plugins/smooth-scroll/jquery.smooth-scroll.js') }}"></script>
	<!-- ANIMATIONS -->
    <script src="{{ URL::asset('/plugins/wow/wow.min.js') }}"></script>
    <!-- PARALLAX -->
    <script src="{{ URL::asset('/plugins/parallax/parallax.min.js') }}"></script>

	<script type="text/javascript">
		$(function(){

			// STICKY NAV
		    $(window).scroll(function() {
		        if ($(this).scrollTop() >= 200) {
		        	if (!$('body').hasClass('im-fixed')) {
			        	$('#main-navigation').hide();
			        	$('#main-navigation').fadeIn('slow');
		        	}
		            $('body').addClass('im-fixed');
		        }
		        else {
		            $('body').removeClass('im-fixed');
		        }
		    });

		    // MOBILE MENU		    
		    $('#nav-icons').on('click', function(e) {
				e.preventDefault();
				$(this).toggleClass('open');
				$("body").toggleClass('nav-in');
			});
			
		    // back to top
		    if ($('#back-to-top').length) {
			    var scrollTrigger = 500, // px
			        backToTop = function () {
			            var scrollTop = $(window).scrollTop();
			            if (scrollTop > scrollTrigger) {
			                $('#back-to-top').fadeIn();
			            } else {
			                $('#back-to-top').fadeOut();
			            }
			        };
			    backToTop();
			    $(window).on('scroll', function () {
			        backToTop();
			    });
			    $('#back-to-top').on('click', function (e) {
			        e.preventDefault();
			        $('html,body').animate({
			            scrollTop: 0
			        }, 700);
			    });
			}
		});
	</script>
	<script src="{{ URL::asset('/js/login/index.js') }}"></script>
