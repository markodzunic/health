@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
@include('admin.MyKnowledgeBox.title')
@include('admin.MyKnowledgeBox.content')
@include('admin.MyKnowledgeBox.site-map-popup')
@stop



	
@section('AditionalFoot')
@stop