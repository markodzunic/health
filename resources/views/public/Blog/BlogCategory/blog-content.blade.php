{{-- <div id="blog-grid">
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
 --}}
<section id="blog-page">
		<div class="container-fluid big-padding">
			 @if ($blogs)
				@foreach ($blogs as $blog)
					<div class="im-blog-col">
						<article>
							<div class="bolg-image-container">
								<a href="{{ URL::to('/blogSingle?id='.$blog->id) }}">
									<img class="blog-image" src="{{ asset('/img/'.$blog->image) }}">
								</a>
							</div>
							<div class="blog-expert-content">
								<p class="blog-date">{{ $blog->created_at }}</p>
								<a href="{{ URL::to('/blogSingle?id='.$blog->id) }}"><h2 class="blog-title">{{ $blog->title?:'N/A' }}</h2></a>
								<p class="blog-expert">{{ $blog->description ? str_limit(strip_tags(HTMLDomParser::str_get_html($blog->description)->find('body p')[0]), 80) : 'N/A' }}</p>
							</div>
							<div class="blog-footer">
								<a><i class="fa fa-user"></i>{{ $blog->user_first }} {{ $blog->user_last }}</a>
							</div>
						</article>
					</div>
				@endforeach
			@endif
</div>
	</section>