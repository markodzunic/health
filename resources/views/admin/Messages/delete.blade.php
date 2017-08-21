<div id="deleteMessagesN" title="Delete Message">
	  {!! Form::open( ['method' => 'POST', 'id' => 'deleteMessageF'] ) !!}
	    	<fieldset>
						{{ Form::label('message', 'Are you sure you want to delete this message?') }}
        		{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $data['id'] }}">
				</fieldset>
		{!! Form::close() !!}
</div>
