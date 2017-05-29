@extends('AdminPart::layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
@include('AdminPart::UserAccount.Feedback.title')
@include('AdminPart::UserAccount.Feedback.form')
@stop

	
@section('AditionalFoot')
	
@stop