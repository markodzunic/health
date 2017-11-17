@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style>
#page-wrapper {
	background-color: #fff;
}
.box-grid .grid-col-content {
    border: 2px solid #00b0f0;
}

</style>
@stop

@section('MainContent')
@include('admin.MyKnowledgeBox.title')
@include('admin.MyKnowledgeBox.content')

@stop




@section('AditionalFoot')
@include('admin.layouts.promo')
<script type="text/javascript">
	$(document).ready(function() {
		window.setInterval(function(){
		  $('.promo-add .item').toggleClass('active');
		}, 5000);
	});
</script>
@stop
