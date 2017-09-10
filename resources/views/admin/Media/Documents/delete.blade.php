<div id="deleteDocument" title="Delete Document">
	  {!! Form::open( ['method' => 'POST', 'id' => 'deleteDocument'] ) !!}
	    	<fieldset>
						{{ Form::label('message', 'Are you sure you want to delete this document?') }}
        		{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $data['id'] }}">
				</fieldset>
		{!! Form::close() !!}
</div>
