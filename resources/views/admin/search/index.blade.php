@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style type="text/css">
	.im-toggle-menu-item:before, .im-accordion-menu-item:before {
		color: rgba(0,176,240,1);
		    right: 19px !important;
	}
	.notification-title, .h2.notification-title {
		float: left;
		width: 100%;
	}
	.im-notification {
		position: relative;
		float: left;
    	width: 100%;
	}
	.im-toggle-menu-item {
	    position: absolute;
	    top: 5px;
	    right: 0;
	    width: 50px;
	    height: 50px;
	    border: 0;
	}
</style>
@stop

@section('MainContent')
	@include('admin.search.title')
    @include('admin.search.content')

@stop

@section('AditionalFoot')
<script src="{{ URL::asset('/js/init-sidemenu.js') }}"></script>
@stop
