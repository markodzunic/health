@extends('public.layouts.default-template')
@section('AditionalHead')

@stop

@section('StartPreloader')

@stop

@section('PageBanner')
@include('public.PricingPlan.title')
@include('public.PricingPlan.content')
@stop

@section('MainContent')

@stop


@section('EndPreloader')

@stop
	
@section('AditionalFoot')
	<script type="text/javascript">
		$('#pricing-plan-1 a').on('click', function (e) {
			e.preventDefault();
			$('.im-pricing-plan-x').fadeOut();
			$('.pricing-plan-1').fadeIn();
			$('#plan-navigation').fadeIn();
		});
		$('#pricing-plan-2 a').on('click', function (e) {
			e.preventDefault();			
			$('.im-pricing-plan-x').fadeOut();
			$('.pricing-plan-2').fadeIn();
			$('#plan-navigation').fadeIn();
		});
		$('#pricing-plan-3 a').on('click', function (e) {
			e.preventDefault();
			$('.im-pricing-plan-x').fadeOut();
			$('.pricing-plan-3').fadeIn();
			$('#plan-navigation').fadeIn();
		});
		$('#plan-navigation a.im-prev').on('click', function (e) {
			e.preventDefault();
			if ($('.pricing-plan-1').is(':visible')) {
				$('.im-pricing-plan-s').fadeOut();
				$('.pricing-plan-3').fadeIn();
			} else if ($('.pricing-plan-2').is(':visible')) {
				$('.im-pricing-plan-s').fadeOut();
				$('.pricing-plan-1').fadeIn();
			} else if ($('.pricing-plan-3').is(':visible')) {
				$('.im-pricing-plan-s').fadeOut();
				$('.pricing-plan-2').fadeIn();
			}
		});
		$('#plan-navigation a.im-next').on('click', function (e) {
			e.preventDefault();
			if ($('.pricing-plan-1').is(':visible')) {
				$('.im-pricing-plan-s').fadeOut();
				$('.pricing-plan-2').fadeIn();
			} else if ($('.pricing-plan-2').is(':visible')) {
				$('.im-pricing-plan-s').fadeOut();
				$('.pricing-plan-3').fadeIn();
			} else if ($('.pricing-plan-3').is(':visible')) {
				$('.im-pricing-plan-s').fadeOut();
				$('.pricing-plan-1').fadeIn();
			}
		});
		$('#plan-navigation a.im-close').on('click', function (e) {
			e.preventDefault();
			$('.im-pricing-plan-x').fadeIn();
			$('#plan-navigation').fadeOut();
			$('.im-pricing-plan-s').fadeOut();
		});
	</script>
@stop