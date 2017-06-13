@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
@include('admin.UserAccount.Profile.title')
@include('admin.UserAccount.Profile.personal-info')
@include('admin.UserAccount.Profile.password')
@include('admin.UserAccount.Profile.delete-account')
@stop

	
@section('AditionalFoot')
	
@stop