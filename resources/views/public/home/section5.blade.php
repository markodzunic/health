<section id="download-brochure">
	<div class="small-padding bg-pink im-white im-center" style="padding-top: 30px;padding-bottom: 30px;">
		<div class="container">
			<div class="row">
				<div class="col-sm-8"><h2 class="im-left im-animation no-margin-bottom">Download iMedical Brochure</h2></div>
				<div class="col-sm-4"><a data-scroll href="#download-brochure" class="btn im-btn white-btn no-margin-bottom" id="brochure-btn">Download Now</a></div>
			</div>
		</div>
	</div>
	<div id="form-brochure" class="small-padding" style="display: none;">
		<div class="container">
			@if(Session::has('alert-success'))
				<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('alert-success') !!}</em></div>
			@endif
			<form class="line-form" method="POST" action="/public_part/create">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-12">
						<p><strong>Fields marked with an asterisk are required</strong></p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<label>
							First Name<span>*</span>
							<input name="first_name" type="text">
						</label>
						@if ($errors->has('first_name'))
								<span class="help-block">
										<strong>{{ $errors->first('first_name') }}</strong>
								</span>
						@endif
					</div>
					<div class="col-sm-6 col-xs-12">
						<label>
							Surname<span>*</span>
							<input name="last_name" type="text">
						</label>
						@if ($errors->has('last_name'))
								<span class="help-block">
										<strong>{{ $errors->first('last_name') }}</strong>
								</span>
						@endif
					</div>
					<div class="col-xs-12">
						<label>
							Position / Title
							<input name="position" type="text">
						</label>
						@if ($errors->has('position'))
								<span class="help-block">
										<strong>{{ $errors->first('position') }}</strong>
								</span>
						@endif
					</div>
					<div class="col-sm-6 col-xs-12">
						<label>
							Telephone<span>*</span>
							<input name="phone" type="text">
						</label>
						@if ($errors->has('phone'))
								<span class="help-block">
										<strong>{{ $errors->first('phone') }}</strong>
								</span>
						@endif
					</div>
					<div class="col-sm-6 col-xs-12">
						<label>
							Email<span>*</span>
							<input name="email" type="text">
						</label>
						@if ($errors->has('email'))
								<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
								</span>
						@endif
					</div>
					<div class="col-xs-12">
						<label>
							Practice Name
							<input name="practice_name" type="text">
						</label>
						@if ($errors->has('practice_name'))
								<span class="help-block">
										<strong>{{ $errors->first('practice_name') }}</strong>
								</span>
						@endif
					</div>
					<div class="col-xs-12 im-center">
						<div style="height: 30px"></div>
						<button href="#" class="btn im-btn pink-btn">Download iMedical Brochure</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
