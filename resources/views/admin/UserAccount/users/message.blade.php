<div id="messageUser" title="Send message">
	  {!! Form::open( ['method' => 'POST', 'id' => 'messageUser'] ) !!}
	    	<fieldset>
        		{{ csrf_field() }}

            <input type="hidden" name="id" value="{{ $data['id'] }}">
            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                <label for="subject" class="col-md-4 control-label">Subject</label>

                <div class="col-md-8">
                    <input id="subject" type="text" class="form-control" name="subject" required autofocus>

                    @if ($errors->has('subject'))
                        <span class="help-block">
                            <strong>{{ $errors->first('subject') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description" class="col-md-4 control-label">Message</label>

                <div class="col-md-8">
                    <textarea id="description" class="form-control" name="description" required autofocus></textarea>

                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

				</fieldset>
		{!! Form::close() !!}
</div>
