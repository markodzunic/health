@extends('public.layouts.default-template')
@section('AditionalHead')
<style>
	.title-section {
		background-color: rgba(255,102,255,1);
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
	@include('public.Faqs.title')
@stop

@section('MainContent')
	@include('public.Faqs.content')
	<section style="background: #333; width: 100%; height: 5px;"></section>
@stop


@section('EndPreloader')

@stop
	
@section('AditionalFoot')
	<script type="text/javascript">
		$(document).ready(function() {
		$('.logo .icon-logo').attr('src',$('.logo .icon-logo').attr('src').replace('imdeical-logo-icon','imdeical-logo-icon-w'));

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