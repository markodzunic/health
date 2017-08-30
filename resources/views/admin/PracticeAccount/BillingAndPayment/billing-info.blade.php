<div id="updateBilling" title="Edit Billing Info">
	  {!! Form::open( ['method' => 'POST', 'id' => 'editBillingInfoForm', 'files' => true ] ) !!}
	    <fieldset>
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
            <label for="first_name" class="col-md-4 control-label">First Name</label>
            <input type="hidden" name="id" value="{{ $practice->id }}">
            <div class="col-md-8">
                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $practice->first_name?:'' }}" required autofocus>

                @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
            <label for="last_name" class="col-md-4 control-label">Last Name</label>

            <div class="col-md-8">
                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $practice->last_name?:'' }}" required autofocus>

                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
            <label for="company" class="col-md-4 control-label">Company</label>

            <div class="col-md-8">
                <input id="company" type="text" class="form-control" name="company" value="{{ $practice->company?:'' }}" required autofocus>

                @if ($errors->has('company'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company') }}</strong>
                    </span>
                @endif
            </div>
        </div>

				<div class="form-group{{ $errors->has('address_1') ? ' has-error' : '' }}">
            <label for="address_1" class="col-md-4 control-label">Address 1</label>

            <div class="col-md-8">
                <input id="address_1" type="text" class="form-control" name="address_1" value="{{ $practice->address_1?:'' }}" required autofocus>

                @if ($errors->has('address_1'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address_1') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('address_2') ? ' has-error' : '' }}">
            <label for="address_2" class="col-md-4 control-label">Address 2</label>

            <div class="col-md-8">
                <input id="address_2" type="text" class="form-control" name="address_2" value="{{ $practice->address_2?:'' }}" required autofocus>

                @if ($errors->has('address_2'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address_2') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone" class="col-md-4 control-label">Phone</label>

            <div class="col-md-8">
                <input id="phone" type="text" class="form-control" name="phone" value="{{ $practice->phone?:'' }}" required autofocus>

                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail</label>

            <div class="col-md-8">
                <input id="email" type="text" class="form-control" name="email" value="{{ $practice->email?:'' }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
            <label for="city" class="col-md-4 control-label">City</label>

            <div class="col-md-8">
                <input id="city" type="text" class="form-control" name="city" value="{{ $practice->city?:'' }}" required autofocus>

                @if ($errors->has('city'))
                    <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
            <label for="state" class="col-md-4 control-label">State</label>

            <div class="col-md-8">
                <input id="state" type="text" class="form-control" name="state" value="{{ $practice->state?:'' }}" required autofocus>

                @if ($errors->has('state'))
                    <span class="help-block">
                        <strong>{{ $errors->first('state') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
            <label for="country" class="col-md-4 control-label">Country</label>

            <div class="col-md-8">
                <input id="country" type="text" class="form-control" name="country" value="{{ $practice->country?:'' }}" required autofocus>

                @if ($errors->has('country'))
                    <span class="help-block">
                        <strong>{{ $errors->first('country') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
            <label for="zip" class="col-md-4 control-label">Zip</label>

            <div class="col-md-8">
                <input id="zip" type="text" class="form-control" name="zip" value="{{ $practice->zip?:'' }}" required autofocus>

                @if ($errors->has('zip'))
                    <span class="help-block">
                        <strong>{{ $errors->first('zip') }}</strong>
                    </span>
                @endif
            </div>
        </div>
	    </fieldset>
{!! Form::close() !!}
</div>
