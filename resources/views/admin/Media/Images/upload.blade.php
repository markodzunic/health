<div id="uploadImage" title="Image Upload">
	  {!! Form::open( ['method' => 'POST', 'id' => 'uploadImageForm', 'files' => true ] ) !!}
	    <fieldset>
        {{ csrf_field() }}
				<input type="hidden" name="id" value="{{ isset($page->id) ? $page->id : 0 }}">

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-12 control-label">Name</label>

            <div class="col-md-12">
                <input id="name" type="text" class="form-control" name="name" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
				<label for="image" class="col-md-4 control-label">Image</label>

				<div class="col-md-8">
					<input id="image" type="file" class="form-control inputfile inputfile-2" name="image" required autofocus>

                    <label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span class="im-white">Choose a file&hellip;</span></label>

					@if ($errors->has('image'))
						<span class="help-block">
							<strong>{{ $errors->first('image') }}</strong>
						</span>
					@endif
				</div>
		</div>

	    </fieldset>
{!! Form::close() !!}
</div>