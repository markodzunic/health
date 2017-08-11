@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style type="text/css">
	#page-wrapper {
		background-color: #f9f9f9;
	}
	.bg-grey {
		background: #fff;
	}
</style>
@stop

@section('MainContent')
@include('admin.home.title')
@include('admin.home.content')
@include('admin.layouts.promo')
@stop

	
@section('AditionalFoot')
@stop