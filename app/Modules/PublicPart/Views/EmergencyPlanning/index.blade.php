@extends('PublicPart::layouts.default-template')
@section('AditionalHead')

@stop

@section('SideMenu')
@include('PublicPart::layouts.side-navigation')
@stop

@section('PageBanner')
@include('PublicPart::layouts.banner-title')
@stop

@section('MainContent')
<div id="RecommendedBestPractice" class="MainContentSection">
	@include('PublicPart::EmergencyPlanning.section1')
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
</div>
<div id="HowOurPracticeDiffersFromRBP" class="MainContentSection"></div>
<div id="Checklists" class="MainContentSection"></div>
<div id="Templates" class="MainContentSection"></div>
<div id="FAQs" class="MainContentSection"></div>
<div id="UsefulResources" class="MainContentSection"></div>
@stop



	
@section('AditionalFoot')
	<script src="{{ URL::asset('/js/init-sidemenu.js') }}"></script>
@stop