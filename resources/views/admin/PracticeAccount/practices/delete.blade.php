<div id="deletePractice" title="Delete Practice">
	  {!! Form::open( ['method' => 'POST', 'id' => 'deletePractice'] ) !!}
	    	<fieldset>
						{{ Form::label('message', 'Are you sure you want to delete this practice?') }}
        		{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $data['id'] }}">
				</fieldset>
		{!! Form::close() !!}
</div>
