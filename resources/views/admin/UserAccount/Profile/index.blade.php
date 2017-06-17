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
	<script type="text/javascript">
        $(function() {
            $('#date_of_birth').datetimepicker();
        });
    </script>
@stop
