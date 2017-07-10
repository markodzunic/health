<div id="updateBlog" title="Edit Blog">
	  {!! Form::open( ['method' => 'POST', 'id' => 'editBlogInfoForm', 'files' => true ] ) !!}
	    <fieldset>
        {{ csrf_field() }}
				<input type="hidden" name="id" value="{{ isset($blog->id) ? $blog->id : 0 }}">

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">Title</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="{{ isset($blog->id) ? $blog->title : '' }}" required autofocus>

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

				<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
						<label for="image" class="col-md-4 control-label">Image</label>

						<div class="col-md-6">
								<input id="image" type="file" class="form-control" name="image" value="{{ isset($blog->image) ? $blog->image :'' }}" required autofocus>
								@if (isset($blog->image) && $blog->image)
									{{ Html::image(asset('/img/'.$blog->image)) }}
								@endif
								{{ Form::label('email', isset($blog->image) ? $blog->image :'None') }}

								@if ($errors->has('image'))
										<span class="help-block">
												<strong>{{ $errors->first('image') }}</strong>
										</span>
								@endif
						</div>
				</div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-4 control-label">Description</label>

            <div class="col-md-6">
                <input id="description" type="text" class="form-control" name="description" value="{{ isset($blog->description) ? $blog->description :'' }}" required autofocus>

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
	    </fieldset>
{!! Form::close() !!}
</div>
