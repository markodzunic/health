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
@include('admin.UserAccount.Feedback.title')
@include('admin.UserAccount.Feedback.form')
@stop

	
@section('AditionalFoot')
	
@stop