@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
@include('admin.MyKnowledgeBox.title')
@include('admin.MyKnowledgeBox.content')
@include('admin.MyKnowledgeBox.site-map-popup')
@stop



	
@section('AditionalFoot')
	<script type="text/javascript">
		function resize() {
			  var height = $('#main-grid-col').outerHeight();
			  $('#knoledge-grid .grid-col-2x').css('height', height);
			  var height2 = height/2;
			  var innerHeight2x =  $('#knoledge-grid .grid-col-2x .grid-col-content').outerHeight();
			  var addMargin2x = ((height - innerHeight2x)/2) - 20;
			  $('#knoledge-grid .grid-col-2x .grid-col-content').css('top', addMargin2x);
	          $.each($('.grid-col'), function() {
		          	var innerHeight = $(this).find('.grid-col-content').outerHeight();
		          	var addMargin = ((height2 - innerHeight)/2) -20;
		            $(this).css('height', height2);
		            $(this).find('.grid-col-content').css('top', addMargin);
		        });
	      }
	      $(document).ready(function(){
	      	resize();
	      })
	</script>
@stop