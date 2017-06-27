<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.layouts.head')
	@yield('AditionalHead')
</head>
<body>
	<div id="wrapper">

	@include('admin.layouts.header')

	<div id="page-wrapper">
       <div class="container-fluid">
	       <div class="content-wrapper">
	      	 	{{-- @include('admin.layouts.page-title') --}}
				@yield('MainContent')
	       </div>{{-- container-fluid --}}
       </div>
    </div>{{-- page-wrapper --}}


	@include('admin.layouts.footer')

	@include('admin.layouts.foot')
	<!-- Morris Charts JavaScript -->
	<!-- {{-- <script src="{{ URL::asset('/plugins/morris/raphael.min.js') }}"></script> --}}
    {{-- <script src="{{ URL::asset('/plugins/morris/morris.min.js') }}"></script> --}}
    {{-- <script src="{{ URL::asset('/plugins/morris/morris-data.js') }}"></script> --}} -->
	@yield('AditionalFoot')

	</div>{{-- /#wrapper --}}
</body>
</html>
