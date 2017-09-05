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
@include('public.PricingPlan.title')
@stop

@section('MainContent')
@include('public.PricingPlan.content')
@stop


@section('EndPreloader')

@stop
	
@section('AditionalFoot')
	<script type="text/javascript">
		// $('#pricing-plan-1 a').on('click', function (e) {
		// 	e.preventDefault();
		// 	$('.im-pricing-plan-x').fadeOut();
		// 	$('.pricing-plan-1').fadeIn();
		// 	$('#plan-navigation').fadeIn();
		// });
		// $('#pricing-plan-2 a').on('click', function (e) {
		// 	e.preventDefault();			
		// 	$('.im-pricing-plan-x').fadeOut();
		// 	$('.pricing-plan-2').fadeIn();
		// 	$('#plan-navigation').fadeIn();
		// });
		// $('#pricing-plan-3 a').on('click', function (e) {
		// 	e.preventDefault();
		// 	$('.im-pricing-plan-x').fadeOut();
		// 	$('.pricing-plan-3').fadeIn();
		// 	$('#plan-navigation').fadeIn();
		// });
		// $('#plan-navigation a.im-prev').on('click', function (e) {
		// 	e.preventDefault();
		// 	if ($('.pricing-plan-1').is(':visible')) {
		// 		$('.im-pricing-plan-s').fadeOut();
		// 		$('.pricing-plan-3').fadeIn();
		// 	} else if ($('.pricing-plan-2').is(':visible')) {
		// 		$('.im-pricing-plan-s').fadeOut();
		// 		$('.pricing-plan-1').fadeIn();
		// 	} else if ($('.pricing-plan-3').is(':visible')) {
		// 		$('.im-pricing-plan-s').fadeOut();
		// 		$('.pricing-plan-2').fadeIn();
		// 	}
		// });
		// $('#plan-navigation a.im-next').on('click', function (e) {
		// 	e.preventDefault();
		// 	if ($('.pricing-plan-1').is(':visible')) {
		// 		$('.im-pricing-plan-s').fadeOut();
		// 		$('.pricing-plan-2').fadeIn();
		// 	} else if ($('.pricing-plan-2').is(':visible')) {
		// 		$('.im-pricing-plan-s').fadeOut();
		// 		$('.pricing-plan-3').fadeIn();
		// 	} else if ($('.pricing-plan-3').is(':visible')) {
		// 		$('.im-pricing-plan-s').fadeOut();
		// 		$('.pricing-plan-1').fadeIn();
		// 	}
		// });
		// $('#plan-navigation a.im-close').on('click', function (e) {
		// 	e.preventDefault();
		// 	$('.im-pricing-plan-x').fadeIn();
		// 	$('#plan-navigation').fadeOut();
		// 	$('.im-pricing-plan-s').fadeOut();
		// });
		$(document).ready(function() {		
			$('.logo .icon-logo').attr('src',$('.logo .icon-logo').attr('src').replace('imdeical-logo-icon','imdeical-logo-icon-w'));
		});
	</script>
@stop