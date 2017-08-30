@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
	@include('admin.PracticeAccount.BillingAndPayment.title')

	{!! view('admin.PracticeAccount.BillingAndPayment.content', [
			'limit' => $limit,
			'subscription' => $subscription,
			'practice' => $practice,
			'billing_address' => $billing_address,
			'user' => $user,
	])->render() !!}
@stop




@section('AditionalFoot')
		<script src="{{ URL::asset('/js/Admin/users.js') }}"></script>
		<script src="{{ URL::asset('/js/Admin/practices.js') }}"></script>
		<script src="{{ URL::asset('/js/Admin/biling.js') }}"></script>

@stop
