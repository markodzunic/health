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
	.im-toggle-menu-item.not-read:after {
		content: 'new';
		position: absolute;
	    right: 15px;
	    top: 10px;
	    margin: auto;
	    color: #fff;
	    font-weight: normal;
	    font-size: 12px;
	    background: rgba(255,102,255,1);
	    width: 30px;
	    height: 20px;
	    text-align: center;
	    line-height: 18px;
	}
	#table-section {
	    overflow-x: visible;
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
