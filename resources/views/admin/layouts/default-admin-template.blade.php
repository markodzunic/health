<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.layouts.head')
	@yield('AditionalHead')
</head>
<body>
	<div id="wrapper" class="im-animation">

		@include('admin.layouts.header')

		<div id="page-wrapper">
      	 	{{-- @include('admin.layouts.page-title') --}}
			@yield('MainContent')
	    </div>{{-- page-wrapper --}}


		@include('admin.layouts.footer')
		
	</div>{{-- /#wrapper --}}

	@include('admin.layouts.foot')
	@yield('AditionalFoot')
		
</body>
</html>
