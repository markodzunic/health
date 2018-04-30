<section>
	<div class="small-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-sm-12 col-md-offset-1 class-test">
					<p>If you would like to arrange a demo of iMedical or if you have questions, then please submit the online form below and we will get back to you as soon as possible. 
					<br>
					<br>
					We hope you can join us in using iMedical!
					</p>
					<br>
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-sm-12 col-md-offset-1">
					@if(Session::has('alert-success'))
						<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('alert-success') !!}</em></div>
					@endif
					<p class="h4 im-pink">Please complete this form</p>
					<form class="line-form" method="POST" action="/contact/create">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-12">
								<p><strong>Fields marked with an asterisk are required</strong></p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-xs-12">
								<label>
									First Name<span> *</span>
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
									Last Name<span> *</span>
									<input name="last_name" type="text">
								</label>
								@if ($errors->has('last_name'))
										<span class="help-block">
												<strong>{{ $errors->first('last_name') }}</strong>
										</span>
								@endif
							</div>
							<div class="col-sm-6 col-xs-12">
								<label>
									Position / Title<span> *</span>
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
									Practice Name<span> *</span>
									<input name="practice_name" type="text">
								</label>
								@if ($errors->has('practice'))
										<span class="help-block">
												<strong>{{ $errors->first('practice') }}</strong>
										</span>
								@endif
							</div>
							<div class="col-sm-6 col-xs-12">
								<label>
									Phone<span> *</span>
									<input name="phone"type="text">
								</label>
								@if ($errors->has('phone'))
										<span class="help-block">
												<strong>{{ $errors->first('phone') }}</strong>
										</span>
								@endif
							</div>
							<div class="col-sm-6 col-xs-12">
								<label>
									Email<span> *</span>
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
									Message<span> *</span>
									<textarea name="description"></textarea>
								</label>
								@if ($errors->has('description'))
										<span class="help-block">
												<strong>{{ $errors->first('description') }}</strong>
										</span>
								@endif
							</div>
							<div class="col-xs-12 im-center">
								<div style="height: 30px"></div>
								<button href="#" class="btn im-btn pink-btn">Send Message</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
