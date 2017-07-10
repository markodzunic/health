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
	@include('public.Blog.BlogSingle.related-posts')
@stop


@section('EndPreloader')

@stop
	
@section('AditionalFoot')
	
@stop