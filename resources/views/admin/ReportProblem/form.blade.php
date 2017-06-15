<div class="form-box">
	@if(Session::has('alert-success'))
		<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('alert-success') !!}</em></div>
	@endif
	<form method="GET" action="/report_problem/create">
		<div class="row">
			<div class="col-md-12">
				<p><strong>Fields marked with an asterisk are required</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<label>						
					<input id="first_name" name="first_name" type="text" placeholder="First Name">
				</label>
			</div>
			<div class="col-sm-6 col-xs-12">
				<label>						
					<input id="last_name" name="last_name" type="text" placeholder="Last Name">
				</label>
			</div>
			<div class="col-sm-6 col-xs-12">
				<label>						
					<input id="position" name="position" type="text" placeholder="Position / Title">
				</label>
			</div>
			<div class="col-sm-6 col-xs-12">
				<label>						
					<input id="practice_name" name="practice_name" type="text" placeholder="Practice Name">
				</label>
			</div>
			<div class="col-sm-6 col-xs-12">
				<label>						
					<input id="phone" name="phone" type="text" placeholder="Phone">
				</label>
			</div>
			<div class="col-sm-6 col-xs-12">
				<label>						
					<input id="email" name="email" type="text" placeholder="Email">
				</label>
			</div>
			<div class="col-xs-12">
				<label>						
					<textarea id="description" name="description" placeholder="Details"></textarea>
				</label>
			</div>
			<div class="col-xs-12">
				<div class="control-group">
	              <div class="controls"> 
	                <input id="UrgentForm" type="checkbox" name="urgent" value="1" ><label for="UrgentForm">If this problem is urgent, then please tick this box<span></span></label>
	              </div>
	            </div>
			</div>						
			
			<input type="submit" class="btn im-btn pink-btn" value="Send">
		</div>
	</form>
</div>