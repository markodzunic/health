@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
@include('admin.UserAccount.Profile.title')
@include('admin.UserAccount.Profile.personal-info')
@include('admin.UserAccount.Profile.password')
@include('admin.UserAccount.Profile.delete-account')
@include('admin.UserAccount.Profile.edit-info-popup')
@include('admin.UserAccount.Profile.confirm-account-delete')
@stop

	
@section('AditionalFoot')
	<script type="text/javascript">
        $(function() {
            $('#date_of_birth').datetimepicker();
        });
    </script>
@stop