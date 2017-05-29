@extends('AdminPart::layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
@include('AdminPart::ReportProblem.title')
@include('AdminPart::ReportProblem.form')
@stop



	
@section('AditionalFoot')
	
@stop