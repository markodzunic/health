@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style type="text/css">
	.user-image {
		float: left;
	    position: relative;
	    top: 0;
	    left: 0;
	    margin-right: 20px;
	    width: 50px;
	    height: 50px;
	}
	.im-toggle-menu-item:before {
		content: 'View Message';
	    font-size: 12px;
	    bottom: 10px;
	    top: auto;
	}
	.im-toggle-menu-item.im-open:before {
	    content: 'Hide Message';
	    font-size: 12px;
	    bottom: 10px;
	    top: auto;
	}
</style>
@stop

@section('MainContent')
	@include('admin.Messages.title')
	<div id="table-section" class="table-section">
		{!! view('admin.Messages.content', [
				'messages' => $messages,
				'practice' => $practice
		])->render() !!}
	</div>
@stop

@section('AditionalFoot')
<script src="{{ URL::asset('/js/Admin/messages.js') }}"></script>
<script>
		Messages.init();
</script>
<!-- <script src="{{ URL::asset('/js/init-sidemenu.js') }}"></script> -->

@stop
