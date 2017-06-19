<!DOCTYPE html>
<html lang="en">
<head>
	@include('public.layouts.head')	
	@yield('AditionalHead')
</head>
<body id="home">
	@yield('StartPreloader')
	@include('public.layouts.header')
	@yield('SideMenu')

	@yield('PageBanner')

	<div id="MainContent">
		@yield('MainContent')
	</div>

	@include('public.layouts.footer')
	@include('public.layouts.modal-login')
	@yield('EndPreloader')

	@include('public.layouts.foot')
	@yield('AditionalFoot')	

</body>
</html>

