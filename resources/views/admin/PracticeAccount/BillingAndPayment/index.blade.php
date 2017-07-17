@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
	@include('admin.PracticeAccount.BillingAndPayment.title')
	@include('admin.PracticeAccount.BillingAndPayment.content')
@stop




@section('AditionalFoot')
		<script src="{{ URL::asset('/js/Admin/users.js') }}"></script>
		<script src="{{ URL::asset('/js/Admin/practices.js') }}"></script>
@stop
