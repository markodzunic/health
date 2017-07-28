<div id="logoutDialog" title="Logout">
	  {!! Form::open( ['method' => 'POST', 'id' => 'logout'] ) !!}
	    	<fieldset>
						{{ Form::label('message', 'Are you sure you want to logout?') }}
        		{{ csrf_field() }}
				</fieldset>
		{!! Form::close() !!}
</div>
