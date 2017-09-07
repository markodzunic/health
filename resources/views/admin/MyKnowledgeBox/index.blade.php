@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style>
#page-wrapper {
	background-color: #fff;
}
.box-grid .grid-col-content {
    border: 2px solid #f9f9f9;
}
</style>
@stop

@section('MainContent')
@include('admin.MyKnowledgeBox.title')
@include('admin.MyKnowledgeBox.content')
{{-- @include('admin.MyKnowledgeBox.site-map-popup') --}}
@include('admin.layouts.promo')
@stop




@section('AditionalFoot')
@stop
