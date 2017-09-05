<section class="small-padding">
	<div class="container bg-white" style="padding-top: 30px; border: 2px solid #efefef;">
		<div class="row">
			@if(Session::has('alert-success'))
			    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('alert-success') !!}</em></div>
			@endif
		    <div class="col-md-12">
		        <p>We appreciate you taking the time out to let us know how we can improve the iMedical Knowledge Box. Please include your feedback in the box below.</p>
		    </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="UpdatePassword">
					<form method="GET" action="/feedback/create">
						{{-- Old Password --}}
						<textarea name="description" id="description" cols="100" rows="10" style="border-color:#333"></textarea>
						<br /><br />
						<input type="submit" class="btn im-btn lblue-btn">
					</form>
				</div>
			</div>
		</div>
	</div>
</section>