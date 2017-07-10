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
		<section id="RecommendedBestPractice" class="MainContentSection">
			<div class="bg-pink white-text im-left">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="expandable-title">Recommended Best Practice (RBP)</h2>
							<div class="im-accordion"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="im-expand">
				<!-- INCLUDE SECTION CONTETN -->
				@yield('RecommendedBestPractice')
			</div>

		</section>

		<section id="HowOurPracticeDiffersFromRBP" class="MainContentSection">
			<div class="bg-pink white-text im-left">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="expandable-title">How our Practice differs from RBP</h2>
							<div class="im-accordion"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="im-expand">
				<!-- INCLUDE SECTION CONTETN -->
				@yield('HowOurPracticeDiffersFromRBP')
			</div>

		</section>

		<section id="Checklists" class="MainContentSection">
			<div class="bg-pink white-text im-left">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="expandable-title">Checklists</h2>
							<div class="im-accordion"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="im-expand">
				<!-- INCLUDE SECTION CONTETN -->
				@yield('Checklists')
			</div>

		</section>

		<section id="Templates" class="MainContentSection">
			<div class="bg-pink white-text im-left">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="expandable-title">Templates (specific to each section)</h2>
							<div class="im-accordion"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="im-expand">
				<!-- INCLUDE SECTION CONTETN -->
				@yield('Templates')
			</div>

		</section>

		<section id="FAQs" class="MainContentSection">
			<div class="bg-pink white-text im-left">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="expandable-title">FAQs</h2>
							<div class="im-accordion"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="im-expand">
				<!-- INCLUDE SECTION CONTETN -->
				@yield('FAQs')
			</div>

		</section>

		<section id="UsefulResources" class="MainContentSection">
			<div class="bg-pink white-text im-left">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="expandable-title">Useful Resources</h2>
							<div class="im-accordion"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="im-expand">
				<!-- INCLUDE SECTION CONTETN -->
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

