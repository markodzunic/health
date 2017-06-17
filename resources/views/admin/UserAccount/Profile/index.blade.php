@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
	@include('admin.UserAccount.Profile.title')

	{!! view('admin.UserAccount.Profile.personal-info', [
				'user' => $user,
				'role' => $role,
		]) !!}

	@include('admin.UserAccount.Profile.password')
	@include('admin.UserAccount.Profile.delete-account')
@stop


@section('AditionalFoot')
		<script src="{{ URL::asset('/js/Admin/profile.js') }}"></script>
@stop
