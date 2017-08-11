@extends('public.layouts.default-template')
@section('AditionalHead')

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
@stop


@section('EndPreloader')

@stop
	
@section('AditionalFoot')
	<script type="text/javascript">
		 $(document).ready(function() {		 
		  $('#main-navigation .right-nav .menu-item:nth-child(1)').addClass('im-active');
		});
	</script>
@stop