@extends('public.layouts.default-template')
@section('AditionalHead')
<style>
	.title-section {
		background-color: rgba(0,32,96,1);
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
@include('public.Blog.BlogCategory.title')
@stop

@section('MainContent')
	<section>
		<div class="container-fluid big-padding">
			@include('public.Blog.BlogCategory.blog-content', [
				'blogs' => $blogs
			])
		</div>
	</section>
	<section class="bg-blue" style="width: 100%; height: 5px;"></section>
@stop


@section('EndPreloader')

@stop

@section('AditionalFoot')
	<script type="text/javascript">
		 $(document).ready(function() {
		 	$('.logo .icon-logo').attr('src',$('.logo .icon-logo').attr('src').replace('imdeical-logo-icon','imdeical-logo-icon-w'));
		  $('#main-navigation .right-nav .menu-item:nth-child(1)').addClass('im-active');
		});
	</script>
@stop
