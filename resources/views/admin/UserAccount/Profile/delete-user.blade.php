<div id="deleteUser" title="Delete User">
	  {!! Form::open( ['method' => 'POST', 'id' => 'deleteUser'] ) !!}
	    	<fieldset>
						{{ Form::label('message', 'Are you sure you want to delete this user?') }}
        		{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $user->id }}">
				</fieldset>
		{!! Form::close() !!}
</div>
