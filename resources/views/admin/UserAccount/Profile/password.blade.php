<div id="UpdatePasswordModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
		<div class="small-padding no-padding-top">
			<div class="row">
			    <div class="col-md-12">
			        <h4><strong>Update Your Password</strong></h4>
			    </div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="UpdatePassword" class="form-box">
						@if(Session::has('alert-success'))
						    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('alert-success') !!}</em></div>
						@endif
						<form method="post" action="/updatePassword">
							{{ csrf_field() }}
							<div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
			            <label for="old_password" class="col-md-4 control-label">Old Password</label>

			            <div class="col-md-12">
			                <input id="old_password" type="old_password" class="form-control" name="old_password" required>

			                @if ($errors->has('old_password'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('old_password') }}</strong>
			                    </span>
			                @endif
			            </div>
			        </div>

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			            <label for="password" class="col-md-4 control-label">Password</label>

			            <div class="col-md-12">
			                <input id="password" type="password" class="form-control" name="password" required>

			                @if ($errors->has('password'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('password') }}</strong>
			                    </span>
			                @endif
			            </div>
			        </div>

			        <div class="form-group">
			            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

			            <div class="col-md-12">
			                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
			            </div>
			        </div>
							<label for="" align="right">
							<input type="submit" class="btn im-btn pink-btn" value="Update Password">
							</label>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
  </div>
</div>