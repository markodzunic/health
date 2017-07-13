@extends('public.layouts.default-template')
@section('AditionalHead')

@stop

@section('StartPreloader')

@stop

@section('PageBanner')
	@include('public.Faqs.title')
	@include('public.Faqs.content')
@stop

@section('MainContent')

@stop


@section('EndPreloader')

@stop
	
@section('AditionalFoot')
	<script type="text/javascript">
		$(document).ready(function() {
		  $('.im-toggle-container > .im-toggle-menu-item').click(function(e) {
		  	  e.preventDefault();	
		  	  var item = $(this).next();

		  	  if (!item.hasClass('im-active')) {
		  	  	item.parent().find('.im-toggle-content').hide('fast');
		  	  	item.parent().find('.im-toggle-content').removeClass('im-active');
		  	  	item.parent().find('.im-toggle-menu-item').removeClass('bg-lblue im-open');

		  	  	$(this).addClass('bg-lblue im-open');
		  	  	item.addClass('im-active')
		  	  	item.toggle('fast');
		  	  } else {
		  	  	item.parent().find('.im-toggle-content').hide('fast');
		  	  	item.parent().find('.im-toggle-content').removeClass('im-active');
		  	  	item.parent().find('.im-toggle-menu-item').removeClass('bg-lblue im-open');
		  	  }
		  });
		  $('#main-navigation .left-nav .menu-item:nth-child(3)').addClass('im-active');
		});
	</script>
@stop