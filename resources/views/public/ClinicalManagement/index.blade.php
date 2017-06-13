@extends('public.layouts.page-layout')
@section('AditionalHead')

@stop

@section('SideMenu')
@include('public.layouts.side-navigation')
@stop

@section('PageBanner')
@include('public.layouts.banner-title')
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