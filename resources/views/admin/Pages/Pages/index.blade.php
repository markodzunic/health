@extends('admin.layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
	@include('admin.Pages.Pages.title')

  <section>
    <div class="container-fluid">

    	<div class="toolbar">
        <input type="hidden" id="orderby" name="orderby" value="{{ $orderby }}">
        <input type="hidden" id="sortby" name="sortby" value="{{ $sortby }}">
      </div>
  
      <div id="table-section" class="table-section">
        {!! view('admin.Pages.Pages.table', [
            'pages' => $pages,
            'columns' => $columns,
            'pagination' => $pagination,
        ]) !!}
      </div>
    </div>
  </section>

@stop

@section('AditionalFoot')
		<script src="{{ URL::asset('/js/Admin/pages.js') }}"></script>
		<script type="text/javascript">
				Pages.init();
		</script>
@stop
