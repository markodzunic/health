@extends('public.layouts.page-layout')
@section('AditionalHead')

@stop

@section('SideMenu')
@stop

@section('PageBanner')
@include('public.EmergencyPlanning.title')
@stop

@section('MainContent')
	@include('public.EmergencyPlanning.section1')
@stop
@section('RecommendedBestPractice')
	@include('public.EmergencyPlanning.section2')
	@include('public.EmergencyPlanning.section3')
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
	<script src="{{ URL::asset('/js/init-sidemenu.js') }}"></script>
	
@stop