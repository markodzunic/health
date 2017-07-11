<div id="deletePage" title="Delete Page">
	  {!! Form::open( ['method' => 'POST', 'id' => 'deletePage'] ) !!}
	    	<fieldset>
						{{ Form::label('message', 'Are you sure you want to delete this page?') }}
        		{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $data['id'] }}">
				</fieldset>
		{!! Form::close() !!}
</div>
