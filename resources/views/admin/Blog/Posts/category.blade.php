<div id="updateCategory" title="Add Category">
	  {!! Form::open( ['method' => 'POST', 'id' => 'editCategoryForm', 'files' => true ] ) !!}
	    <fieldset>
        {{ csrf_field() }}
		<input type="hidden" name="id" value="{{ isset($id) ? $id : 0 }}">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-12 control-label">Name</label>

            <div class="col-md-12">
                <input id="name" type="text" class="form-control" name="name" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    {!! Form::close() !!}
</div>
