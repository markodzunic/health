@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style type="text/css">
body, #page-wrapper {
    background-color: #F9F9F9;
}
</style>
@stop

@section('MainContent')
@include('admin.UserAccount.Feedback.title')
@include('admin.UserAccount.Feedback.form')
@stop

	
@section('AditionalFoot')
	
@stop