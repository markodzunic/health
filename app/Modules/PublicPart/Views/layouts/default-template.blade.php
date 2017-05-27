<!DOCTYPE html>
<html lang="en">
<head>
	@include('PublicPart::layouts.head')	
	@yield('AditionalHead')
</head>
<body id="home">
	@yield('StartPreloader')
	@include('PublicPart::layouts.header')

	@yield('PageBanner')

	<div id="MainContent">
		@yield('MainContent')
	</div>

	@include('PublicPart::layouts.footer')
	@include('PublicPart::layouts.modal-login')
	@yield('EndPreloader')

	@include('PublicPart::layouts.foot')
	@yield('AditionalFoot')	

</body>
</html>

