@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
	@include('admin.PracticeAccount.Profile.title')
	@if (!empty($practice))
		@include('admin.PracticeAccount.Profile.practice-info')
		@include('admin.PracticeAccount.Profile.administrator')
		@include('admin.PracticeAccount.Profile.practice-staff')
		{{-- @include('admin.PracticeAccount.Profile.additional-users') --}}
		{{-- @include('admin.PracticeAccount.Profile.delete-account') --}}
		@include('admin.PracticeAccount.Profile.edit-info-popup')
		@include('admin.PracticeAccount.Profile.add-user-popup')
		@include('admin.PracticeAccount.Profile.confirm-account-delete')
	@endif
@stop


@section('AditionalFoot')
	<script src="{{ URL::asset('/js/Admin/practices.js') }}"></script>
	<script src="{{ URL::asset('/js/Admin/users.js') }}"></script>
	<script type="text/javascript">
			$(function() {
					$('input[name="date_of_birth"]').datetimepicker();
			});
  </script>
@stop
