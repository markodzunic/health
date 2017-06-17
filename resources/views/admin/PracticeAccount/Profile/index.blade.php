@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
	@include('admin.PracticeAccount.Profile.title')
	@include('admin.PracticeAccount.Profile.practice-info')
	@include('admin.PracticeAccount.Profile.administrator')
	@include('admin.PracticeAccount.Profile.additional-users')
	@include('admin.PracticeAccount.Profile.delete-account')
@stop

	
@section('AditionalFoot')
	<script type="text/javascript">
        $(function() {
            $('#date_of_birth').datetimepicker();
        });
    </script>
@stop