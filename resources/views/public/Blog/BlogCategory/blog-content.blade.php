<div id="blog-grid">
	<div class="row">
		@if ($blogs)
			@foreach ($blogs as $blog)
					<div class="col-md-12 col-sm-12">
						<article>
							<div class="featured-image no-padding-top ">
								<img src="{{ asset('/img/'.$blog->image) }}" alt="">
							</div>
							<div class="blog-expert-content">
								<a href="{{ URL::to('/blog-single') }}"><h4 class="blog-title im-pink">{{ $blog->title?:'N/A' }}</h4></a>
								<p class="blog-expert">{{ $blog->description ? str_limit(strip_tags(HTMLDomParser::str_get_html($blog->description)->find('body p')[0]), 50) : 'N/A' }}</p>
								<a href="{{ URL::to('/blog-single') }}" class="btn full-btn im-btn lblue-btn">Read More</a>
							</div>
						</article>
					</div>
				@endforeach
			@endif

	</div>
</div>
