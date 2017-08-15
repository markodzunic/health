@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style>
	.im-toggle-menu-item {
		border-bottom: 1px solid rgba(0,176,240,1);
		background-color: rgba(0,176,240,1);
		color: #fff !important;
	}
	.im-toggle-menu-item:before, .im-accordion-menu-item:before {
		color: #fff;
	}
</style>
@stop

@section('MainContent')
@include('admin.MyKnowledgeBox.Features.title')
{{-- @include('admin.MyKnowledgeBox.Features.menu') --}}
@include('admin.MyKnowledgeBox.Features.content')

@stop



	
@section('AditionalFoot')
<script src="{{ URL::asset('/js/init-sidemenu.js') }}"></script>
<script type="text/javascript">
	$('.toggle').click(function(e) {
	  	e.preventDefault();
	  
	    var $this = $(this);
	  
	    if (!$this.next().hasClass('show')) { 
	        $this.parent().parent().find('li .inner').removeClass('show');
	        $this.parent().parent().find('a.toggle').removeClass('im-active');
	        $this.parent().parent().find('li .inner').hide();
	        $this.next().toggleClass('show');
	        $this.toggleClass('im-active');
	        $this.next().toggle();
	    }
	});
	function resizeAcoridians() {
		var heightWindow = $(window).height();
		var headerHeight = $('.navbar-header ').height();
		var contentHeight = heightWindow - headerHeight - 50;
		var boxHeight = (contentHeight/6)-5;

		$('ul.accordion > li, ul.accordion > li > a.toggle').css('height', boxHeight);

		var textHeight = $('ul.accordion > li > a.toggle > span').height();
		var textPosition = (boxHeight - textHeight)/2;
		var iconPosition = (boxHeight - 25)/2;

		$('ul.accordion > li > a.toggle > span').css('margin-top', textPosition);
		$('ul.accordion > li > a.toggle > i').css('margin-top', iconPosition);

		

	}
	$(document).ready(function () {
		$('#wrapper').addClass('im-expande');
		resizeAcoridians();
	})
</script>
@stop