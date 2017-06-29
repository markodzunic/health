@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
	@include('admin.PracticeAccount.Profile.title')
	@if (!empty($practice))
		@include('admin.PracticeAccount.Profile.practice-info')
		@include('admin.PracticeAccount.Profile.administrator')
		@include('admin.PracticeAccount.Profile.practice-staff')
	@endif
@stop


@section('AditionalFoot')
	<script src="{{ URL::asset('/js/Admin/users.js') }}"></script>
	<script src="{{ URL::asset('/js/Admin/practices.js') }}"></script>
@stop
