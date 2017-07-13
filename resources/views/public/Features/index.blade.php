@extends('public.layouts.default-template')
@section('AditionalHead')

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
@stop


@section('EndPreloader')

@stop
	
@section('AditionalFoot')
	<script type="text/javascript">
		$(document).ready(function() {
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
		        scrollTop: $("#im-accordion-content").offset().top - 80},
		        'slow');

		  	  } else {
		  	  	item.parent().parent().find('.im-accordion').hide('fast');
		  	  	item.parent().parent().find('.im-accordion').removeClass('im-active');
		  	  	$(this).parent().find('a').removeClass('im-active');
		  	  	$(this).parent().find('a').blur();
		  	  }

		      
		  });
		  $('#main-navigation .left-nav .menu-item:nth-child(2)').addClass('im-active');
		});
	</script>
@stop