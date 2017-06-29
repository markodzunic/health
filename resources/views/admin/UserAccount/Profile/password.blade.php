<div id="editPassword" title="Edit Password">
	  {!! Form::open( ['method' => 'POST', 'id' => 'UpdatePasswordModal', 'files' => true ] ) !!}
	    <fieldset>
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
	    </fieldset>
    {!! Form::close() !!}
</div>
