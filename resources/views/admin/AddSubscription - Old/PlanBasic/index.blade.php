@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style>
#page-wrapper,
body {
	background-color: #f9f9f9;
}
</style>
@stop

@section('MainContent')
@include('admin.AddSubscription.PlanBasic.title')
@include('admin.AddSubscription.PlanBasic.content')
@stop



	
@section('AditionalFoot')
	
@stop