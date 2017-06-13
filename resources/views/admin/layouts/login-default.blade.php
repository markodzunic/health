<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.layouts.head')	
	@yield('AditionalHead')
</head>
<body style="background: #fff">
	
	

	
       <div class="container">
      	 	{{-- @include('admin.layouts.page-title') --}}
			@yield('MainContent')
       </div>{{-- container-fluid --}}
    
	

	@include('admin.layouts.footer')	

	@include('admin.layouts.foot')
	@yield('AditionalFoot')	

</body>
</html>

