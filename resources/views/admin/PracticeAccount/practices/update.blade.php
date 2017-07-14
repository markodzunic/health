<div id="updatePractice" title="Edit Practice">
	  {!! Form::open( ['method' => 'POST', 'id' => 'editPracticeInfoForm', 'files' => true ] ) !!}
	    <fieldset>
        {{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $practice->id }}">

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Name</label>

            <div class="col-md-8">
                <input id="name" type="text" class="form-control" name="name" value="{{ $practice->name?:'' }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

				<div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
						<label for="avatar" class="col-md-4 control-label">Avatar</label>

						<div class="col-md-8">
								<input id="avatar" type="file" class="form-control inputfile inputfile-2" name="avatar" value="{{ $practice->avatar?:'' }}" required autofocus>
                                <label for="avatar"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span class="im-white">Choose a file&hellip;</span></label>
								@if ($practice->avatar)
									{{ Html::image(asset('/img/'.$practice->avatar)) }}
								@else
									{{ Html::image(asset('/img/avatar.jpg')) }}
								@endif
								{{ Form::label('email', $practice->avatar?:'None') }}

								@if ($errors->has('avatar'))
										<span class="help-block">
												<strong>{{ $errors->first('avatar') }}</strong>
										</span>
								@endif
						</div>
				</div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-4 control-label">Description</label>

            <div class="col-md-8">
                <input id="description" type="text" class="form-control" name="description" value="{{ $practice->description?:'' }}" required autofocus>

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

				<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <label for="address" class="col-md-4 control-label">Address</label>

            <div class="col-md-8">
                <input id="address" type="text" class="form-control" name="address" value="{{ $practice->address?:'' }}" required autofocus>

                @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
            <label for="fax" class="col-md-4 control-label">Fax</label>

            <div class="col-md-8">
                <input id="fax" type="text" class="form-control" name="fax" value="{{ $practice->fax?:'' }}" required autofocus>

                @if ($errors->has('fax'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fax') }}</strong>
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

        <div class="form-group{{ $errors->has('site') ? ' has-error' : '' }}">
            <label for="site" class="col-md-4 control-label">Site</label>

            <div class="col-md-8">
                <input id="site" type="text" class="form-control" name="site" value="{{ $practice->site?:'' }}" required autofocus>

                @if ($errors->has('site'))
                    <span class="help-block">
                        <strong>{{ $errors->first('site') }}</strong>
                    </span>
                @endif
            </div>
        </div>
	    </fieldset>
{!! Form::close() !!}
</div>
