@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style>
#page-wrapper {
	background-color: #f9f9f9;
}
</style>
@stop

@section('MainContent')
@include('admin.MyKnowledgeBox.title')
@include('admin.MyKnowledgeBox.content')
@include('admin.MyKnowledgeBox.site-map-popup')
@include('admin.layouts.promo')
@stop



	
@section('AditionalFoot')
@stop