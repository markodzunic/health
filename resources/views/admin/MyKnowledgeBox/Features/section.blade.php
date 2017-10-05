<section class="im-odd-bg " title="Emergency Planning" align="justify">

	<a id="{{ $rp->id }}" href="#" class="im-toggle-menu-item">{{ $rp->title }}</a>
	<div class="im-toggle-content">

		<div class="container">
			<div class="row">
				<div class="col-md-12">

				</div>
			</div>
			<div class="row">
				{!! $rp->description ? $rp->description :'N/A' !!}
			</div>

		</div>
	</div>
</section>
