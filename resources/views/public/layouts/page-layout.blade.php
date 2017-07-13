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
		<section id="RecommendedBestPractice" class="margin-top-70">
			<div class="container bg-pink im-left">
				<div class="row">
					<div class="col-md-12 im-accordion-menu-item">
						<a href="#" class="h2 im-white">Recommended Best Practice (RBP)</a>
					</div>
				</div>
			</div>
			<!-- INCLUDE SECTION CONTETN -->
			<div class="im-accordion container">
				@yield('RecommendedBestPractice')
			</div>

		</section>

		<section id="HowOurPracticeDiffersFromRBP">
			<div class="container bg-pink im-left">
				<div class="row">
					<div class="col-md-12 im-accordion-menu-item">
						<a href="#" class="h2 im-white">How our Practice differs from RBP</a>
					</div>
				</div>
			</div>
			<!-- INCLUDE SECTION CONTETN -->
			<div class="im-accordion container">
				@yield('HowOurPracticeDiffersFromRBP')
			</div>

		</section>

		<section id="Checklists">
			<div class="container bg-pink im-left">
				<div class="row">
					<div class="col-md-12 im-accordion-menu-item">
						<a href="#" class="h2 im-white">Checklists</a>
					</div>
				</div>
			</div>
			<!-- INCLUDE SECTION CONTETN -->
			<div class="im-accordion container">
				@yield('Checklists')
			</div>

		</section>

		<section id="Templates">
			<div class="container bg-pink im-left">
				<div class="row">
					<div class="col-md-12 im-accordion-menu-item">
						<a href="#" class="h2 im-white">Templates (specific to each section)</a>
					</div>
				</div>
			</div>
			<!-- INCLUDE SECTION CONTETN -->
			<div class="im-accordion container">
				@yield('Templates')
			</div>
		</section>

		<section id="FAQs">
			<div class="container bg-pink im-left">
				<div class="row">
					<div class="col-md-12 im-accordion-menu-item">
						<a href="#" class="h2 im-white">FAQs</a>
					</div>
				</div>
			</div>
			<!-- INCLUDE SECTION CONTETN -->
			<div class="im-accordion container">
				@yield('FAQs')
			</div>

		</section>

		<section id="UsefulResources" class="margin-bottom-70">
			<div class="container bg-pink im-left">
				<div class="row">
					<div class="col-md-12 im-accordion-menu-item">
						<a href="#" class="h2 im-white">Useful Resources</a>
					</div>
				</div>
			</div>
			<!-- INCLUDE SECTION CONTETN -->
			<div class="im-accordion container">
				@include('public.layouts.useful-resources')
			</div>

		</section>
	</div>

	@include('public.layouts.footer')
	@include('public.layouts.modal-login')
	@yield('EndPreloader')

	@include('public.layouts.foot')
	@yield('AditionalFoot')	

</body>
</html>

