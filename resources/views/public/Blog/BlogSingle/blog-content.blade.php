<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<article>
					<div id="blog-content">
						<h4>{{ $blog->title?:'N/A' }}</h4>
						<p>{{ $blog->description?:'N/A' }}</p>
					</div>

					<div id="blog-info">
						<span><strong class="im-blue">Category: </strong>
							@if ($categories)
								@foreach ($categories as $cat)
									<a href="{{ URL::to('/blogCategory?category='.$cat->id) }}" class="im-pink">{{ $cat->name }}</a>
								@endforeach
							@endif

						</span>
						<span><strong class="im-blue">Tags: </strong>
							<ul class="list-inline" style="display: inline-block;">
								@if ($tags)
									@foreach ($tags as $tag)
										<li><a class="im-pink">{{ $tag->name }}</a></li>
									@endforeach
								@endif
							</ul>
						</span>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>
