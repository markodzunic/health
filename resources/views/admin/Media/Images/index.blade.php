@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style type="text/css">
body, #page-wrapper {
    background-color: #fff;
}
#gallery-grid {

}
#gallery-grid ul,
#gallery-grid ul li {
	list-style: none;
	padding: 0;
	margin: 0;
	display: inline-block;
}
#gallery-grid ul li {
	margin-right: 15px;
	margin-bottom: 15px;
}
#gallery-grid  .gallery-item {
	position: relative;
	width: 170px;
	height: 170px;
	display: block;
	padding: 10px;
	border: 2px solid #f9f9f9;
}
#gallery-grid  .gallery-item img {
	max-width: 100%;
	margin-bottom: 0 !important;
}
#gallery-grid  .gallery-item .button-container {
	display: none;
	position: absolute;
	top: 15px;
	right: 15px;
}
#gallery-grid  .gallery-item:before {
	content: '';
	position: absolute;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	margin:auto;
	background: rgba(255,255,255,.8);
	display: none;

}
#gallery-grid  .gallery-item:hover .button-container,
#gallery-grid  .gallery-item:hover:before {
	display: block;
}
#image-preview {
	position: fixed;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	margin:auto;
	z-index: 9999;

	display: none;
}
#image-preview.active {
	display: block;
}
.image-preview-overlay {
	position: absolute;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	margin:auto;
	background: rgba(0,32,96,.8);
	z-index: -1;
}
.preview-container {
	z-index: 99999;
	display: table;
	vertical-align: middle;
	width: 100%;
	height: 100%;
	text-align: center;
}
#image-preview .close2 {
	z-index: 99999;
	position: fixed;
	top: 15px;
	right: 15px;
	font-size: 30px;
	color: #fff !important;

}
.preview-container .container-i {
	display: table-cell;
	vertical-align: middle;
}
</style>
@stop

@section('MainContent')
	@include('admin.Media.Images.title')

	<div id="toolbar">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<a onclick="Media.UploadImage(this); return false;" class="btn im-btn empty-btn im-border-btn">Add New</a>
				</div>
			</div>
		</div>
	</div>

	<div id="table-section" class="table-section">
        {!! view('admin.Media.Images.content', [
            'images' => $images
        ]) !!}
    </div>

	{{-- @include('admin.Media.Images.content') --}}

@stop


@section('AditionalFoot')
	<script src="{{ URL::asset('/js/Admin/media.js') }}"></script>
	<script type="text/javascript">
    	Media.init();
    </script>
@stop
