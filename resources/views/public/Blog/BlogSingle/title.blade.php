<section class="title-section">
		<div class="container big-padding">
			<div class="row">
				<div class="col-md-12 im-center">
					<h1>{{ $blog->title?:'N/A' }}</h1>
					<p><span><strong>By: </strong>{{ $user->first_name }} {{ $user->last_name }}</span> |
						<span>{{ $blog->created_at?:'N/A' }}</span></p>
				</div>
			</div>
		</div>
	<div class="container">
		<div class="featured-image">
			<img src="{{ asset('/img/'.$blog->image) }}" alt="">
		</div>
	</div>
</section>
