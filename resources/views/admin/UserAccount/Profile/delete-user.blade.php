<div id="deleteUser" title="Delete User">
	  {!! Form::open( ['method' => 'POST', 'id' => 'deleteUser'] ) !!}
	    	<fieldset>
						{{ Form::label('message', 'The action is permanent and cannot be undone!
						Are you sure you want to delete this account?') }}
        		{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $user->id }}">
				</fieldset>
		{!! Form::close() !!}
</div>
