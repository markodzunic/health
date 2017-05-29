<!DOCTYPE html>
<html lang="en">
<head>
	@include('AdminPart::layouts.head')	
	@yield('AditionalHead')
</head>
<body style="background: #fff">
	
	

	
       <div class="container">
      	 	{{-- @include('AdminPart::layouts.page-title') --}}
			@yield('MainContent')
       </div>{{-- container-fluid --}}
    
	

	@include('AdminPart::layouts.footer')	

	@include('AdminPart::layouts.foot')
	@yield('AditionalFoot')	

</body>
</html>

