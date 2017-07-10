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
		<div class="container">
			<div class="row">
				@include('public.Blog.BlogCategory.blog-content')
				@include('public.Blog.blog-side-menu')
			</div>
		</div>
	</section>
@stop


@section('EndPreloader')

@stop
	
@section('AditionalFoot')
	
@stop