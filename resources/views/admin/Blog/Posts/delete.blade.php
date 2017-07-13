<div id="deleteBlog" title="Delete Blog">
	  {!! Form::open( ['method' => 'POST', 'id' => 'deleteBlog'] ) !!}
	    	<fieldset>
						{{ Form::label('message', 'Are you sure you want to delete this post?') }}
        		{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $data['id'] }}">
				</fieldset>
		{!! Form::close() !!}
</div>
