@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style type="text/css">
body, #page-wrapper {
    background-color: #fff;
}
</style>
@stop

@section('MainContent')
@include('admin.UserAccount.Feedback.title')
@include('admin.UserAccount.Feedback.form')
@stop

	
@section('AditionalFoot')
	
@stop