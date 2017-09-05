@extends('public.layouts.default-template')
@section('AditionalHead')
<style>
	.title-section {
		background-color: rgba(0,176,240,1);
	}
	@media screen and (min-width: 992px) {
		#main-navigation a.menu-item {
		    color: #fff;
		}
		#main-navigation a.menu-btn {
		    color: #fff;
		    border: 2px solid #fff;
		}
		.im-fixed #main-navigation a.menu-item {
		    color: #333;
		}
		.im-fixed #main-navigation a.menu-btn {
		    color: #333;
		    border: 2px solid #333;
		}
	}
</style>
@stop

@section('StartPreloader')

@stop

@section('PageBanner')
	@include('public.Features.title')
@stop

@section('MainContent')
	@include('public.Features.intro')
	@include('public.Features.menu')
	@include('public.Features.content')
	@include('public.Features.content2')
@stop


@section('EndPreloader')

@stop
	
@section('AditionalFoot')
	<script type="text/javascript">
		$(document).ready(function() {

		$('.logo .icon-logo').attr('src',$('.logo .icon-logo').attr('src').replace('imdeical-logo-icon','imdeical-logo-icon-w'));

		  $('#im-accordion-menu > .im-accordion-menu-item').click(function(e) {
		  	  e.preventDefault();	
		      var index = $(this).index() + 1;
		      var item = $('#im-accordion-content > .im-accordion:nth-child('+ index +')');

		      if (!item.hasClass('im-active')) {
		  	  	item.parent().parent().find('.im-accordion').hide('fast');
		  	  	item.parent().parent().find('.im-accordion').removeClass('im-active');
		  	  	$(this).parent().find('a').removeClass('im-active');
		  	  	$(this).parent().find('a').blur(); 

		  	  	$(this).find('a').addClass('im-active');
		  	  	item.addClass('im-active')
		  	  	item.toggle('fast');

		  	  	$('html,body').animate({
		        scrollTop: $("#im-accordion-content").offset().top - 400},
		        'slow');

		  	  } else {
		  	  	item.parent().parent().find('.im-accordion').hide('fast');
		  	  	item.parent().parent().find('.im-accordion').removeClass('im-active');
		  	  	$(this).parent().find('a').removeClass('im-active');
		  	  	$(this).parent().find('a').blur();
		  	  }

		      
		  });
		  $('#main-navigation .left-nav .menu-item:nth-child(2)').addClass('im-active');

		  var url = $(location).attr('href').split("#")[1];       
		  $('#' + url).click();
		});
	</script>
@stop