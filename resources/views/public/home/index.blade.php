@extends('public.layouts.default-template')
@section('AditionalHead')
	<!-- PRELOADER -->
	<link href="{{ URL::asset('/plugins/preloader/preloader.css') }}" rel="stylesheet">
	<style>
		body {
			background: rgba(0,176,240,1);
		}
		#page-2 {
			opacity: 0;
		}
	</style>
@stop

@section('StartPreloader')
	<div id="loader" class="pageload-overlay" data-opening="M -18 -26.90625 L -18 86.90625 L 98 86.90625 L 98 -26.90625 L -18 -26.90625 Z M 40 29.96875 C 40.01804 29.96875 40.03125 29.98196 40.03125 30 C 40.03125 30.01804 40.01804 30.03125 40 30.03125 C 39.98196 30.03125 39.96875 30.01804 39.96875 30 C 39.96875 29.98196 39.98196 29.96875 40 29.96875 Z">  <svg xmlns="https://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 80 60" preserveAspectRatio="xMidYMid slice"><path d="M -18 -26.90625 L -18 86.90625 L 98 86.90625 L 98 -26.90625 L -18 -26.90625 Z M 40 -25.6875 C 70.750092 -25.6875 95.6875 -0.7500919 95.6875 30 C 95.6875 60.750092 70.750092 85.6875 40 85.6875 C 9.2499078 85.6875 -15.6875 60.750092 -15.6875 30 C -15.6875 -0.7500919 9.2499078 -25.6875 40 -25.6875 Z"/></path></svg>  </div>
	<div class="svg-container" id="page-2">
@stop

@section('PageBanner')
	@include('public.home.banner')
@stop

@section('MainContent')
	@include('public.home.section0')
	@include('public.home.section1')
	@include('public.home.section2')
	@include('public.home.section3')
	@include('public.home.section4')
	@include('public.home.section6')
	@include('public.home.section5')
@stop


@section('EndPreloader')
	</div><!-- End Preloader -->
@stop
	
@section('AditionalFoot')
	<!-- PRELOADER SCRIPTS -->
    	<!-- SNAP SVG -->
    	<script src="{{ URL::asset('/plugins/preloader/snap.svg-min.js') }}"></script>
    	<script src="{{ URL::asset('/plugins/preloader/classie.min.js') }}"></script> 
    	<script src="{{ URL::asset('/plugins/preloader/svg-loader.js') }}"></script> 
    	<script src="{{ URL::asset('/plugins/preloader/init-loader.js') }}"></script>    
   
		<script type="text/javascript">
			$(function(){
			    $('#brochure-btn').on('click',function(e) {
			    	e.preventDefault();
			    	$(this).parent().hide();
			    	$(this).parent().prev().addClass('im-full-width');
			    	$(this).parent().prev().find('h2').removeClass('im-left');
			    	$('#form-brochure').fadeIn('slow');
			    	$.smoothScroll({
			    		offset: -60,
					    scrollTarget: '#download-brochure'
					  });
					  return false;
			    });
			    $('#next-section').on('click',function(e) {
			    	e.preventDefault();
			    	$.smoothScroll({
			    		offset: -82,
					    scrollTarget: '#section1'
					  });
			    });
			    // INTRO SECTION
			    function introSection () {
			    	var heightSection = $('#intro-section').height();
			    	var heightContainer = $('#intro-section .intro-container').height();
			    	var newHeight = ((heightSection - heightContainer)/2)+80;

			    	$('#intro-section .intro-container').css('margin-top', newHeight);
			    }
			    $(document).ready(function() {		 
			      introSection ();
				  $('#main-navigation .left-nav .menu-item:nth-child(1)').addClass('im-active');
				});
				$( window ).resize(function() {
					 introSection ();
				});
			});
		</script>
@stop