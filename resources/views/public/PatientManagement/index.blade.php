@extends('public.layouts.page-layout')
@section('AditionalHead')

@stop

@section('SideMenu')
@stop

@section('PageBanner')
@include('public.PatientManagement.title')
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