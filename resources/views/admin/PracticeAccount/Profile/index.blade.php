@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
	@include('admin.PracticeAccount.Profile.title')
	@include('admin.PracticeAccount.Profile.practice-info')
	@include('admin.PracticeAccount.Profile.administrator')
	@include('admin.PracticeAccount.Profile.practice-staff')
	@include('admin.PracticeAccount.Profile.additional-users')
	@include('admin.PracticeAccount.Profile.delete-account')
	@include('admin.PracticeAccount.Profile.edit-info-popup')
	@include('admin.PracticeAccount.Profile.add-user-popup')
	@include('admin.PracticeAccount.Profile.confirm-account-delete')
@stop

	
@section('AditionalFoot')
	<script type="text/javascript">
        $(function() {
            $('#date_of_birth').datetimepicker();
        });
    </script>
@stop