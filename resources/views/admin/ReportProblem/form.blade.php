<section class="">
	<div class="container">
		<div class="form-box" style="padding: 30px; border: 0">
			@if(Session::has('alert-success'))
				<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('alert-success') !!}</em></div>
			@endif
			<form method="POST" action="/report_problem/create">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-12">
						<h3 style="margin-left: -10px;">Report a problem</h3>
						<p style="margin-left: -10px;"><strong>Fields marked with an asterisk are required</strong></p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<label>
							<input id="first_name" name="first_name" type="text" placeholder="First Name">
						</label>
						@if ($errors->has('first_name'))
								<span class="help-block">
										<strong>{{ $errors->first('first_name') }}</strong>
								</span>
						@endif
					</div>
					<div class="col-sm-6 col-xs-12">
						<label>
							<input id="last_name" name="last_name" type="text" placeholder="Last Name">
						</label>
						@if ($errors->has('last_name'))
								<span class="help-block">
										<strong>{{ $errors->first('last_name') }}</strong>
								</span>
						@endif
					</div>
					<div class="col-sm-6 col-xs-12">
						<label>
							<input id="position" name="position" type="text" placeholder="Position / Title">
						</label>
						@if ($errors->has('position'))
								<span class="help-block">
										<strong>{{ $errors->first('position') }}</strong>
								</span>
						@endif
					</div>
					<div class="col-sm-6 col-xs-12">
						<label>
							<input id="practice_name" name="practice_name" type="text" placeholder="Practice Name">
						</label>
						@if ($errors->has('practice_name'))
								<span class="help-block">
										<strong>{{ $errors->first('practice_name') }}</strong>
								</span>
						@endif
					</div>
					<div class="col-sm-6 col-xs-12">
						<label>
							<input id="phone" name="phone" type="text" placeholder="Phone">
						</label>
						@if ($errors->has('phone'))
								<span class="help-block">
										<strong>{{ $errors->first('phone') }}</strong>
								</span>
						@endif
					</div>
					<div class="col-sm-6 col-xs-12">
						<label>
							<input id="email" name="email" type="text" placeholder="Email">
						</label>
						@if ($errors->has('email'))
								<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
								</span>
						@endif
					</div>
					<div class="col-xs-12">
						<label>
							<textarea id="description" name="description" placeholder="Details"></textarea>
						</label>
						@if ($errors->has('description'))
								<span class="help-block">
										<strong>{{ $errors->first('description') }}</strong>
								</span>
						@endif
					</div>
					<div class="col-xs-12">
						<div class="control-group">
			              <div class="controls">
			                <input id="UrgentForm" type="checkbox" name="urgent" value="1" ><label for="UrgentForm">If this problem is urgent, then please tick this box<span></span></label>
			              </div>
			            </div>
					</div>


					<input type="submit" class="btn im-btn lblue-btn" value="Send" style="margin-top: 15px;margin-left: 5px">
				</div>
			</form>
		</div>
	</div>
</section>
