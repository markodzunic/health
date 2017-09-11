@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style type="text/css">
body, #page-wrapper {
    background-color: #fff;
}
</style>
@stop

@section('MainContent')
	@include('admin.Media.Documents.title')
	<div id="toolbar">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<a onclick="Document.UploadDocument(this); return false;" class="btn im-btn empty-btn im-border-btn" style="font-size: 15px;">Add New</a>
				</div>
			</div>
		</div>
		<input type="hidden" id="orderby" name="orderby" value="{{ $orderby }}">
    	<input type="hidden" id="sortby" name="sortby" value="{{ $sortby }}">
	</div>

	<div id="table-section" class="table-section">
        {!! view('admin.Media.Documents.content', [
            'documents' => $documents,
            'columns' => $columns,
            'pagination' => $pagination,
        ]) !!}
    </div>

@stop


@section('AditionalFoot')
	<script src="{{ URL::asset('/js/Admin/document.js') }}"></script>
	<script type="text/javascript">
	    Document.init();
    </script>
@stop
