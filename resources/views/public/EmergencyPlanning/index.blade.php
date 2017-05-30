@extends('PublicPart::layouts.page-layout')
@section('AditionalHead')

@stop

@section('SideMenu')
@include('PublicPart::layouts.side-navigation')
@stop

@section('PageBanner')
@include('PublicPart::layouts.banner-title')
@stop

@section('MainContent')
	@include('PublicPart::EmergencyPlanning.section1')
@stop
@section('RecommendedBestPractice')
	@include('PublicPart::EmergencyPlanning.section2')
	@include('PublicPart::EmergencyPlanning.section3')
	@include('PublicPart::EmergencyPlanning.section4')
	@include('PublicPart::EmergencyPlanning.section5')
	@include('PublicPart::EmergencyPlanning.section6')
	@include('PublicPart::EmergencyPlanning.section7')
	@include('PublicPart::EmergencyPlanning.section8')
	@include('PublicPart::EmergencyPlanning.section9')
	@include('PublicPart::EmergencyPlanning.section10')
	@include('PublicPart::EmergencyPlanning.section11')
	@include('PublicPart::EmergencyPlanning.section12')
	@include('PublicPart::EmergencyPlanning.section13')
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