@extends('public.layouts.default-template')
@section('AditionalHead')
<style>
	.title-section {
		background-color: rgba(255,102,255,1);
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
		@media screen and (min-width: 992px) {
			#blog-page .im-blog-col:nth-child(n + 5) {
				 width: 20%;
			}
		}
	}
</style>
@stop

@section('StartPreloader')

@stop

@section('PageBanner')
@include('public.Blog.title')
@stop

@section('MainContent')
	<section id="blog-page">
		@include('public.Blog.blog-content')
	</section>
	<section class="bg-blue" style="width: 100%; height: 5px;"></section>
@stop


@section('EndPreloader')

@stop
	
@section('AditionalFoot')
	<script type="text/javascript">
		 $(document).ready(function() {		
		 $('.logo .icon-logo').attr('src',$('.logo .icon-logo').attr('src').replace('imdeical-logo-icon','imdeical-logo-icon-w')); 
		  $('#main-navigation .right-nav .menu-item:nth-child(2)').addClass('im-active');
		});
	</script>
@stop