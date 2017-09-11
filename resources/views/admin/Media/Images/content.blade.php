<section id="img-prev" class="">
	<div class="container-fluid">
		<div id="gallery-grid">
			<ul>
			@if($images)
				@foreach($images as $image)
				<li>
					<div class="gallery-item">
						<img src="{{ asset('/img/'.$image->thumb) }}">

						<div class="button-container">
							<a href="#" images-id="{{ $image->id }}" onclick="Media.Delete(this); return false;" class="delete btn im-btn no-margin-bottom im-btn-small">
							<i class="fa fa-trash" aria-hidden="true"></i>
							<div class="im-btn-info">Delete Image</div></a>

							<a href="#" image="{{ asset('/img/'.$image->path) }}" onclick="Media.View(this); return false;" class="delete btn im-btn no-margin-bottom im-btn-small">
							<i class="fa fa-search" aria-hidden="true"></i>
							<div class="im-btn-info">View Image</div></a>
						</div>
					</div>
				</li>
				@endforeach
			@endif
			</ul>
		</div>
	</div>

	<div id="image-preview">
		<div class="image-preview-overlay"></div>
		<div class="preview-container">

		<a href="#" id="close" class="close2"><i class="fa fa-close im-white"></i></a>
			<div class="container-i im-center">
				<img src="http://via.placeholder.com/1200x800">
			</div>
		</div>
	</div>


</section>