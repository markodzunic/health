@extends('public.layouts.page-layout')
@section('AditionalHead')

@stop

@section('SideMenu')
{{-- @include('public.layouts.side-navigation') --}}
@stop

@section('PageBanner')
@include('public.layouts.banner-title')
@stop

@section('MainContent')
	@include('public.EmergencyPlanning.section1')
@stop
@section('RecommendedBestPractice')
	@include('public.EmergencyPlanning.section2')
	@include('public.EmergencyPlanning.section3')
	@include('public.EmergencyPlanning.section4')
{{-- 	@include('public.EmergencyPlanning.section5')
	@include('public.EmergencyPlanning.section6')
	@include('public.EmergencyPlanning.section7')
	@include('public.EmergencyPlanning.section8')
	@include('public.EmergencyPlanning.section9')
	@include('public.EmergencyPlanning.section10')
	@include('public.EmergencyPlanning.section11')
	@include('public.EmergencyPlanning.section12')
	@include('public.EmergencyPlanning.section13') --}}
@stop
@section('HowOurPracticeDiffersFromRBP')

@stop
@section('Checklists')

@stop
@section('Templates')

@stop
@section('FAQs')

@stop



	
@section('AditionalFoot')
	{{-- <script src="{{ URL::asset('/js/init-sidemenu.js') }}"></script> --}}
	<script type="text/javascript">
		$('.MainContentSection .im-accordion').on('click', function(){
			$(this).parent().parent().parent().parent().parent().toggleClass('im-open');
			$(this).parent().parent().parent().parent().parent().find('.im-expand').toggleClass('im-open');
		});
		$('.im-content-section .im-accordion-2').on('click', function(){
			$(this).parent().parent().parent().parent().toggleClass('im-open-2');
			$(this).parent().parent().parent().parent().find('.im-expand-2').toggleClass('im-open-2');
		});
	</script>
@stop