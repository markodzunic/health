@extends('AdminPart::layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
@include('AdminPart::UserAccount.Profile.title')
@include('AdminPart::UserAccount.Profile.personal-info')
@include('AdminPart::UserAccount.Profile.password')
@include('AdminPart::UserAccount.Profile.delete-account')
@stop

	
@section('AditionalFoot')
	
@stop