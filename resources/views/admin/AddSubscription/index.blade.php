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
@include('admin.AddSubscription.title')
@include('admin.AddSubscription.tables')
@stop



	
@section('AditionalFoot')
	
@stop