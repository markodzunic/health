<div id="editUserInfo" title="Edit User">
	  {!! Form::open( ['method' => 'POST', 'id' => 'editUserInfoForm', 'files' => true ] ) !!}
	    <fieldset>
        {{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $user->id }}">
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">Title</label>

            <div class="col-md-6">
                <select id="title" name="title" class="form-control" required autofocus>
                    <option {{ $user->title == 'dr' ? 'selected="selected"' : '' }} value="dr">Dr</option>
                    <option {{ $user->title == 'mr' ? 'selected="selected"' : '' }} value="mr">Mr</option>
                    <option {{ $user->title == 'mrs' ? 'selected="selected"' : '' }} value="mrs">Mrs</option>
                </select>

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
            <label for="first_name" class="col-md-4 control-label">First Name</label>

            <div class="col-md-6">
                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->first_name?:'' }}" required autofocus>

                @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
            <label for="last_name" class="col-md-4 control-label">Last Name</label>

            <div class="col-md-6">
                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name?:'' }}" required autofocus>

                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

				<div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
						<label for="avatar" class="col-md-4 control-label">Avatar</label>

						<div class="col-md-6">		
								<input id="avatar" type="file" class="form-control" name="avatar" value="{{ $user->avatar?:'' }}" required autofocus>
								{{ Html::image(asset('/img/'.$user->avatar)) }}
								{{ Form::label('email', $user->avatar?:'None') }}

								@if ($errors->has('avatar'))
										<span class="help-block">
												<strong>{{ $errors->first('avatar') }}</strong>
										</span>
								@endif
						</div>
				</div>

        <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
            <label for="date_of_birth" class="col-md-4 control-label">Date of Birth</label>

            <div class="col-md-6">
               <div class='input-group date' id='date_of_birth'>
                    <input type='text' name="date_of_birth" value="{{ $user->date_of_birth?:'' }}" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>

                @if ($errors->has('date_of_birth'))
                    <span class="help-block">
                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
            <label for="gender" class="col-md-4 control-label">Gender</label>

            <div class="col-md-6">
                <select id="gender" name="gender" class="form-control" required autofocus>
                    <option {{ $user->gender == 'male' ? 'selected="selected"' : '' }} value="male">Male</option>
                    <option {{ $user->gender == 'female' ? 'selected="selected"' : '' }} value="female">Female</option>
                </select>

                @if ($errors->has('gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
            <label for="role_id" class="col-md-4 control-label">Role</label>

            <div class="col-md-6">
                <select id="role_id" name="role_id" class="form-control" required autofocus>
                    @if ($roles)
                      @foreach ($roles as $role)
                        <option {{ $role->id == $user->role_id ? 'selected="selected"' : '' }} value="{{ $role->id }}">{{ $role->display_name }}</option>
                      @endforeach
                    @endif
                </select>

                @if ($errors->has('role_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('role_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone" class="col-md-4 control-label">Mobile Phone</label>

            <div class="col-md-6">
                <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone?:'' }}" required autofocus>

                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('position_type') ? ' has-error' : '' }}">
            <label for="position_type" class="col-md-4 control-label">Position Type</label>

            <div class="col-md-6">
                <input id="position_type" type="text" class="form-control" name="position_type" value="{{ $user->position_type?:'' }}" required autofocus>

                @if ($errors->has('position_type'))
                    <span class="help-block">
                        <strong>{{ $errors->first('position_type') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('med_reg_number') ? ' has-error' : '' }}">
            <label for="med_reg_number" class="col-md-4 control-label">Medical Council Registration Number</label>

            <div class="col-md-6">
                <input id="med_reg_number" type="text" class="form-control" name="med_reg_number" value="{{ $user->med_reg_number?:'' }}" required autofocus>

                @if ($errors->has('med_reg_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('med_reg_number') }}</strong>
                    </span>
                @endif
            </div>
        </div>
	    </fieldset>
{!! Form::close() !!}
</div>
