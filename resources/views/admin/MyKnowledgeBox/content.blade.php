<section id="knoledge-grid" class="box-grid">
	<div class="container">

		<div class="row">
			@if ($pages)
				@foreach ($pages as $page)
					<div class="col-md-4">
						<a href="{{ URL::to('/my_knowledge_box_features?page_id='.$page->id) }}" class="im-lblue">
							<div class="bg-white grid-col-content">
								<strong>{{ $page->name }}</strong>
							</div>
						</a>
					</div>
				@endforeach
			@endif
			<div class="col-md-4">
				<a href="{{ URL::to('/documentation') }}" class="im-lblue">
					<div class="bg-white grid-col-content">
						<strong>Inspection & Regulation </strong>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="{{ URL::to('/documentation') }}" class="im-lblue">
					<div class="bg-white grid-col-content">
						<strong>Placeholder</strong>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="{{ URL::to('/documentation') }}" class="im-lblue">
					<div class="bg-white grid-col-content">
						<strong>Placeholder</strong>
					</div>
				</a>
			</div>
		</div>

		
	</div>
</section>
