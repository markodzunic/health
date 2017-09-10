@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style type="text/css">
body, #page-wrapper {
    background-color: #fff;
}
</style>
@stop

@section('MainContent')
	@include('admin.Media.Images.title')
	@include('admin.Media.Images.content')

@stop


@section('AditionalFoot')
	<script type="text/javascript">
    
    </script>
@stop
