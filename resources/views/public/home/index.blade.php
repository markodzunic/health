@extends('PublicPart::layouts.default-template')
@section('AditionalHead')
	<!-- PRELOADER -->
	<link href="{{ URL::asset('/plugins/preloader/preloader.css') }}" rel="stylesheet">

	<!-- REVOLUTION STYLE SHEETS -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/plugins/slider/css/settings.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/plugins/slider/css/revolution.addon.particles.css') }}">
@stop

@section('StartPreloader')
	<div id="loader" class="pageload-overlay" data-opening="M -18 -26.90625 L -18 86.90625 L 98 86.90625 L 98 -26.90625 L -18 -26.90625 Z M 40 29.96875 C 40.01804 29.96875 40.03125 29.98196 40.03125 30 C 40.03125 30.01804 40.01804 30.03125 40 30.03125 C 39.98196 30.03125 39.96875 30.01804 39.96875 30 C 39.96875 29.98196 39.98196 29.96875 40 29.96875 Z">  <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 80 60" preserveAspectRatio="xMidYMid slice"><path d="M -18 -26.90625 L -18 86.90625 L 98 86.90625 L 98 -26.90625 L -18 -26.90625 Z M 40 -25.6875 C 70.750092 -25.6875 95.6875 -0.7500919 95.6875 30 C 95.6875 60.750092 70.750092 85.6875 40 85.6875 C 9.2499078 85.6875 -15.6875 60.750092 -15.6875 30 C -15.6875 -0.7500919 9.2499078 -25.6875 40 -25.6875 Z"/></path></svg>  </div>
	<div class="svg-container" id="page-2">
@stop

@section('PageBanner')
	@include('PublicPart::home.banner')
@stop

@section('MainContent')
	@include('PublicPart::home.section1')
	@include('PublicPart::home.section2')
	@include('PublicPart::home.section3')
	@include('PublicPart::home.section4')
	@include('PublicPart::home.section5')
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
    <!-- REVOLUTION JS FILES -->
	<script type="text/javascript" src="{{ URL::asset('/plugins/slider/jquery.themepunch.tools.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('/plugins/slider/jquery.themepunch.revolution.min.js') }}"></script>
		<!-- SLIDER REVOLUTION 5.0 EXTENSIONS-->	
		<script type="text/javascript" src="{{ URL::asset('/plugins/slider/extensions/revolution.extension.actions.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('/plugins/slider/extensions/revolution.extension.carousel.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('/plugins/slider/extensions/revolution.extension.kenburn.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('/plugins/slider/extensions/revolution.extension.layeranimation.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('/plugins/slider/extensions/revolution.extension.migration.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('/plugins/slider/extensions/revolution.extension.navigation.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('/plugins/slider/extensions/revolution.extension.parallax.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('/plugins/slider/extensions/revolution.extension.slideanims.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('/plugins/slider/extensions/revolution.extension.video.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('/plugins/slider/extensions/revolution.addon.particles.min.js') }}"></script>
		<script type="text/javascript">function setREVStartSize(e){
				try{ var i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;					
					if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");if (c) jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})					
				}catch(d){console.log("Failure at Presize of Slider:"+d)}
			};</script>
		<script type="text/javascript" src="{{ URL::asset('/js/init-slider.js') }}"></script>
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
			    })
			});
		</script>
@stop