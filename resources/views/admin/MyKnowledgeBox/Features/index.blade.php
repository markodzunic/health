@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style>
	.im-toggle-menu-item {
		border-bottom: 1px solid rgba(0,176,240,1);
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
</script>
@stop