@extends('AdminPart::layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
@include('AdminPart::PracticeAccount.Profile.title')
@include('AdminPart::PracticeAccount.Profile.practice-info')
@include('AdminPart::PracticeAccount.Profile.administrator')
@include('AdminPart::PracticeAccount.Profile.additional-users')
@include('AdminPart::PracticeAccount.Profile.delete-account')
@stop

	
@section('AditionalFoot')
	
@stop