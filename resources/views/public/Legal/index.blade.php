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
		#home:not(.im-fixed) #main-navigation a.menu-item:hover,
		#home:not(.im-fixed) #main-navigation a.menu-item:focus,
		#home:not(.im-fixed) #main-navigation a.menu-item.im-active {
		    color: #fff;
		}
		#home:not(.im-fixed) #main-navigation a.menu-item.im-active:before,
		#home:not(.im-fixed) #main-navigation a.menu-item:hover:before {
		    display: block;
		    background: #fff;
		}
	}
</style>
@stop

@section('StartPreloader')

@stop

@section('PageBanner')	
	@include('public.Legal.title')
@stop

@section('MainContent')
	<section class="small-padding has-side">
		<div class="container">
			<div class="row">
				<div class="col-md-4">					
					@include('public.Legal.side')
				</div>
				<div class="col-md-8">
					{{-- @include('public.Legal.content') --}}
				</div>
			</div>
		</div>
	</section>
	<section style="background: #333; width: 100%; height: 5px;"></section>
@stop


@section('EndPreloader')

@stop
	
@section('AditionalFoot')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.logo .icon-logo').attr('src',$('.logo .icon-logo').attr('src').replace('imdeical-logo-icon','imdeical-logo-icon-w'));
		});
	</script>
@stop