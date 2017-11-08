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
{{-- @include('admin.MyKnowledgeBox.site-map-popup') --}}
<div class="row">
	<div class="col-md-12">
		@include('admin.layouts.promo')
	</div>
</div>
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
