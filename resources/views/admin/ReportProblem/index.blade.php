@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style type="text/css">
	#page-wrapper, body {
		background-color: #fff;
	}
	.form-box {
		background: #fff;
	}
	label input[type=text], label input[type=email], label input[type=password], textarea {
		border-color: #333;
		text-align: center;
	}
</style>
@stop

@section('MainContent')
@include('admin.ReportProblem.title')
@include('admin.ReportProblem.form')
@stop



	
@section('AditionalFoot')
	
@stop