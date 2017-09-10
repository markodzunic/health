<div id="deleteImage" title="Delete Image">
	  {!! Form::open( ['method' => 'POST', 'id' => 'deleteImage'] ) !!}
	    	<fieldset>
						{{ Form::label('message', 'Are you sure you want to delete this image?') }}
        		{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $data['id'] }}">
				</fieldset>
		{!! Form::close() !!}
</div>
