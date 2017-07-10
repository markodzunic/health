@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
	@include('admin.Blog.Posts.title')

	<div class="toolbar">
		<a blogs-id="0" onclick="Blogs.Update(this);return false;">Create</a>
    <input type="hidden" id="orderby" name="orderby" value="{{ $orderby }}">
    <input type="hidden" id="sortby" name="sortby" value="{{ $sortby }}">
  </div>

  <div id="table-section" class="table-section">
    {!! view('admin.Blog.Posts.table', [
        'blogs' => $blogs,
        'columns' => $columns,
        'pagination' => $pagination,
    ]) !!}
  </div>

@stop

@section('AditionalFoot')
		<script src="{{ URL::asset('/js/Admin/blogs.js') }}"></script>
		<script type="text/javascript">
				Blogs.init();
		</script>
@stop
