@if ($blogs)
	@foreach ($blogs as $blog)
		<div class="im-blog-col">
			<article>
				<div class="bolg-image-container">
					<a href="{{ URL::to('/blogSingle?id='.$blog->id) }}">
						<img class="blog-image" src="{{ asset('/img/'.$blog->image) }}">
						<a href="{{ URL::to('/blogCategory?category='.$blog->category_id) }}" class="btn im-btn white-btn blog-expert-category">{{ $blog->category }}</a>
					</a>
				</div>
				<div class="blog-expert-content">
					<p class="blog-date">{{ $blog->created_at }}</p>
					<a href="{{ URL::to('/blogSingle?id='.$blog->id) }}"><h2 class="blog-title">{{ $blog->title?:'N/A' }}</h2></a>
					<p class="blog-expert">{{ $blog->description ? str_limit(strip_tags(HTMLDomParser::str_get_html($blog->description)->find('body p')[0]), 150) : 'N/A' }}</p>
				</div>
				<div class="blog-footer">
					<a><i class="fa fa-user"></i>{{ $blog->user_first }} {{ $blog->user_last }}</a>
				</div>
			</article>
		</div>
	@endforeach
@endif
