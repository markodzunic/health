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

@stop




@section('AditionalFoot')
<script type="text/javascript">
	$(document).ready(function() {
		window.setInterval(function(){
		  $('.promo-add .item').toggleClass('active');
		}, 5000);
	});
</script>
@stop
