<!-- SRIPTS -->

	<!-- jQUERY --> 
	<script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
	<!-- BOOTSTRAP JS --> 
	<script src="{{ URL::asset('/plugins/bootstrap/js/bootstrap.min.js') }}"></script>	
	<!-- SMOOTH SCROLL  --> 
	<script src="{{ URL::asset('/plugins/smooth-scroll/jquery.smooth-scroll.js') }}"></script>
	<!-- ANIMATIONS --> 
    <script src="{{ URL::asset('/plugins/wow/wow.min.js') }}"></script>
    
	<script type="text/javascript">
		$(function(){
		    $(window).scroll(function() {
		        if ($(this).scrollTop() >= 200) {
		        	if (!$('#main-navigation').hasClass('navbar-custom-fixed')) {		        		
			        	$('#main-navigation').hide();
			        	$('#main-navigation').fadeIn('slow');
		        	}
		            $('#main-navigation').addClass('navbar-custom-fixed');
		        }
		        else {
		            $('#main-navigation').removeClass('navbar-custom-fixed');
		        }
		    });
		});
	</script>
