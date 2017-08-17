@extends('public.layouts.default-template')
@section('AditionalHead')

@stop

@section('StartPreloader')

@stop

@section('PageBanner')
@include('public.Blog.BlogSingle.title')
@stop

@section('MainContent')
	@include('public.Blog.BlogSingle.blog-content')
	{{-- @include('public.Blog.BlogSingle.related-posts') --}}
	<section class="bg-blue" style="width: 100%; height: 5px;"></section>
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