<section id="knoledge-grid" class="box-grid">
	<div class="container">

		<div class="row">
			@if ($pages)
				@foreach ($pages as $page)
					<div class="col-md-6">
						<a href="{{ URL::to('/my_knowledge_box_features?page_id='.$page->id) }}" class="im-lblue">
							<div class="bg-grey grid-col-content">
								<strong>{{ $page->name }}</strong>
							</div>
						</a>
					</div>
				@endforeach
			@endif
		</div>
	</div>
</section>
