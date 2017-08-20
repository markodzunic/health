@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
	@include('admin.Notifications.title')
    @include('admin.Notifications.content')   

@stop

@section('AditionalFoot')

@stop
