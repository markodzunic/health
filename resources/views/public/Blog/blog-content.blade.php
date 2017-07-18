@if ($blogs)
	@foreach ($blogs as $blog)
		<div class="im-blog-col">
			<article>
				<div class="bolg-image-container">
					<a href="{{ URL::to('/blog-single') }}">
						<img class="blog-image" src="{{ asset('/img/'.$blog->image) }}">
						<a href="{{ URL::to('/blog-category') }}" class="btn im-btn white-btn blog-expert-category">Category</a>
					</a>
				</div>
				<div class="blog-expert-content">
					<p class="blog-date">{{ $blog->created_at }}</p>
					<a href="{{ URL::to('/blog-single') }}"><h2 class="blog-title">{{ $blog->title?:'N/A' }}</h2></a>
					<p class="blog-expert">{{ $blog->description?:'N/A' }}</p>
				</div>
				<div class="blog-footer">
					<a href="{{ URL::to('/blog-single') }}"><i class="fa fa-user"></i>iMedical</a>
				</div>
			</article>
		</div>
	@endforeach
@endif
