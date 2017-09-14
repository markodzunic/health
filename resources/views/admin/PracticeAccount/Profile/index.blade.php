@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style type="text/css">
body, #page-wrapper {
    background-color: #fff;
}
.user-aditional-info {
	position: fixed;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    margin: auto;
    z-index: 9999;
    width: 100%;
    height: 100%;
    background: rgba(0,32,96,.8);
    display: none;

}
.user-aditional-info > .additiontal-wrapper {
	margin-top: 250px;
}
@media screen and (max-width: 767px) {
	.user-aditional-info > .additiontal-wrapper {
		margin-top:65px;
	}
	.user-aditional-info > .additiontal-wrapper .box-content {
		overflow-y: scroll;
		max-height: 200px;
	}
}
</style>
@stop

@section('MainContent')
	@include('admin.PracticeAccount.Profile.title')
	@if (!empty($practice))
		@include('admin.PracticeAccount.Profile.practice-info')
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
          'role' => $role,
					'admin_users' => $admin_users,
	        'practice' => $practice,
	    ]) !!}
	  </div>
	@endif
@stop


@section('AditionalFoot')
	<script src="{{ URL::asset('/js/Admin/users.js') }}"></script>
	<script src="{{ URL::asset('/js/Admin/practices.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.show-additional-content').on('click', function(e){
				e.preventDefault();
				$('.user-aditional-info').toggle('fast');

			})
			$('.hide-additional-content').on('click', function(e){
				e.preventDefault();
				$('.user-aditional-info').toggle('fast');
			})
		});
	</script>
@stop
