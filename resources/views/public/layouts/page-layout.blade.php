<!DOCTYPE html>
<html lang="en">
<head>
	@include('PublicPart::layouts.head')	
	@yield('AditionalHead')
</head>
<body id="home">
	@yield('StartPreloader')
	@include('PublicPart::layouts.header')
	@yield('SideMenu')

	@yield('PageBanner')

	<div id="MainContent">	
		@yield('MainContent')
		<section id="RecommendedBestPractice" class="MainContentSection">
			<div class="small-padding bg-pink white-text im-center">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2>Recommended Best Practice (RBP)</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- INCLUDE SECTION CONTETN -->
			@yield('RecommendedBestPractice')

		</section>

		<section id="HowOurPracticeDiffersFromRBP" class="MainContentSection">
			<div class="small-padding bg-pink white-text im-center">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2>How our Practice differs from RBP</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- INCLUDE SECTION CONTETN -->
			@yield('HowOurPracticeDiffersFromRBP')

		</section>

		<section id="Checklists" class="MainContentSection">
			<div class="small-padding bg-pink white-text im-center">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2>Checklists</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- INCLUDE SECTION CONTETN -->
			@yield('Checklists')

		</section>

		<section id="Templates" class="MainContentSection">
			<div class="small-padding bg-pink white-text im-center">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2>Templates (specific to each section)</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- INCLUDE SECTION CONTETN -->
			@yield('Templates')

		</section>

		<section id="FAQs" class="MainContentSection">
			<div class="small-padding bg-pink white-text im-center">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2>FAQs</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- INCLUDE SECTION CONTETN -->
			@yield('FAQs')

		</section>

		<section id="UsefulResources" class="MainContentSection">
			<div class="small-padding bg-pink white-text im-center">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2>Useful Resources</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- INCLUDE SECTION CONTETN -->
			@include('PublicPart::layouts.useful-resources')

		</section>
	</div>

	@include('PublicPart::layouts.footer')
	@include('PublicPart::layouts.modal-login')
	@yield('EndPreloader')

	@include('PublicPart::layouts.foot')
	@yield('AditionalFoot')	

</body>
</html>

