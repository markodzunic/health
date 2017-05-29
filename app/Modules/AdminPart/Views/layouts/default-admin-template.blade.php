<!DOCTYPE html>
<html lang="en">
<head>
	@include('AdminPart::layouts.head')	
	@yield('AditionalHead')
</head>
<body>
	<div id="wrapper">	
	
	@include('AdminPart::layouts.header')

	<div id="page-wrapper">
       <div class="container-fluid">
      	 	{{-- @include('AdminPart::layouts.page-title') --}}
			@yield('MainContent')
       </div>{{-- container-fluid --}}
    </div>{{-- page-wrapper --}}
	

	@include('AdminPart::layouts.footer')	

	@include('AdminPart::layouts.foot')
	@yield('AditionalFoot')	

	</div>{{-- /#wrapper --}}
</body>
</html>

