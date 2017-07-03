@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
	@include('admin.PracticeAccount.Profile.title')
	@if (!empty($practice))
		@include('admin.PracticeAccount.Profile.practice-info')
		<!-- @include('admin.PracticeAccount.Profile.administrator') -->
		<div id="admin-staff">
	    {!! view('admin.PracticeAccount.Profile.administrator', [
	        'practice_users' => $practice_users,
					'limit' => $limit,
					'admin_users' => $admin_users,
	        'practice' => $practice,
	    ]) !!}
	  </div>

		<div id="practice-stuff">
	    {!! view('admin.PracticeAccount.Profile.practice-staff', [
	        'practice_users' => $practice_users,
					'limit' => $limit,
					'admin_users' => $admin_users,
	        'practice' => $practice,
	    ]) !!}
	  </div>
	@endif
@stop


@section('AditionalFoot')
	<script src="{{ URL::asset('/js/Admin/users.js') }}"></script>
	<script src="{{ URL::asset('/js/Admin/practices.js') }}"></script>
@stop
