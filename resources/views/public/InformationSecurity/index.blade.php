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

@stop
@section('RecommendedBestPractice')

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