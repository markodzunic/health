@extends('public.layouts.default-template')
@section('AditionalHead')

@stop

@section('StartPreloader')

@stop

@section('PageBanner')
@include('public.Blog.BlogTag.title')
@stop

@section('MainContent')
	<section>
		<div class="container-fluid big-padding">
			@include('public.Blog.blog-content')
		</div>
	</section>
@stop


@section('EndPreloader')

@stop
	
@section('AditionalFoot')
	
@stop