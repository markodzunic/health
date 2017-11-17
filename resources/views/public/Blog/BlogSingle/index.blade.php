@extends('public.layouts.default-template')
@section('AditionalHead')
<style type="text/css">
	.im-grey-box {
		padding-top: 30px;
		padding-bottom: 10px;
		background: #efefef;
		margin-left: -15px;
		margin-right: -15px;
		padding-left: 15px;
		padding-right: 15px;
		margin-bottom: 20px
	}
	.im-empty-box {
		padding-top: 30px;
		padding-bottom: 10px;
		border: 1px solid #222;
		margin-left: -15px;
		margin-right: -15px;
		padding-left: 15px;
		padding-right: 15px;
		margin-bottom: 20px
	}
	.table-boarded td,
	.table-boarded th {
		padding: 15px;
	}
	table th,
	table td {
		border: 1px solid;
		padding: 15px;
	}
	#blog-content  ol {
	    display: block;
	    list-style-type: decimal;
	    -webkit-margin-before: 1em;
	    -webkit-margin-after: 1em;
	    -webkit-margin-start: 0px;
	    -webkit-margin-end: 0px;
	    -webkit-padding-start: 40px;
	}
	#blog-content  ul {
	    display: block;
	    list-style-type: disc;
	    -webkit-margin-before: 1em;
	    -webkit-margin-after: 1em;
	    -webkit-margin-start: 0px;
	    -webkit-margin-end: 0px;
	    -webkit-padding-start: 40px;
	}
	#blog-content ul li {
	    display: list-item;
	    text-align: -webkit-match-parent;
	    list-style: inherit;
	}
	#blog-content  ol li {
		list-style-type: decimal;
	}
</style>
@stop

@section('StartPreloader')

@stop

@section('PageBanner')
@include('public.Blog.BlogSingle.title')
@stop

@section('MainContent')
	@include('public.Blog.BlogSingle.blog-content')
	{{-- @include('public.Blog.BlogSingle.related-posts') --}}
	<section class="bg-blue" style="width: 100%; height: 5px;"></section>
@stop


@section('EndPreloader')

@stop
	
@section('AditionalFoot')
	<script type="text/javascript">
		 $(document).ready(function() {		 
		  $('#main-navigation .right-nav .menu-item:nth-child(1)').addClass('im-active');
		});
	</script>
@stop