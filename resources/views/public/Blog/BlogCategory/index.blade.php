@extends('public.layouts.default-template')
@section('AditionalHead')

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
