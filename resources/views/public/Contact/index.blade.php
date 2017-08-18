@extends('public.layouts.default-template')
@section('AditionalHead')
<style>
	.title-section {
		background-color: rgba(0,176,240,1);
	}
	@media screen and (min-width: 992px) {
		#main-navigation a.menu-item {
		    color: #fff;
		}
		#main-navigation a.menu-btn {
		    color: #fff;
		    border: 2px solid #fff;
		}
		.im-fixed #main-navigation a.menu-item {
		    color: #333;
		}
		.im-fixed #main-navigation a.menu-btn {
		    color: #333;
		    border: 2px solid #333;
		}
	}
</style>
@stop

@section('StartPreloader')

@stop

@section('PageBanner')
@include('public.Contact.title')
@include('public.Contact.content')
@stop

@section('MainContent')

@stop


@section('EndPreloader')

@stop
	
@section('AditionalFoot')
	<script type="text/javascript">
		$(document).ready(function () {
			$('.logo .icon-logo').attr('src',$('.logo .icon-logo').attr('src').replace('imdeical-logo-icon','imdeical-logo-icon-w'));
		});
	</script>
@stop