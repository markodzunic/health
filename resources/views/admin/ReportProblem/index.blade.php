@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style type="text/css">
	#page-wrapper, body {
		background-color: #f9f9f9;
	}
	.form-box {
		background: #fff;
	}
</style>
@stop

@section('MainContent')
@include('admin.ReportProblem.title')
@include('admin.ReportProblem.form')
@stop



	
@section('AditionalFoot')
	
@stop