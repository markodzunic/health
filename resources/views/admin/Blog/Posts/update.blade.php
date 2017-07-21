<div id="updateBlog" title="Edit Blog">
	  {!! Form::open( ['method' => 'POST', 'id' => 'editBlogInfoForm', 'files' => true ] ) !!}
	    <fieldset>
        {{ csrf_field() }}
				<input type="hidden" name="id" value="{{ isset($blog->id) ? $blog->id : 0 }}">

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">Title</label>

            <div class="col-md-12">
                <input id="title" type="text" class="form-control" name="title" value="{{ isset($blog->id) ? $blog->title : '' }}" required autofocus>

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

		<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
				<label for="" class="col-md-4 control-label">Image</label>
                <div class="col-md-12">

                        <input id="image" type="file" class="form-control inputfile inputfile-2" name="image" value="{{ isset($blog->image) ? $blog->image :'' }}" required autofocus>
                        <label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span class="im-white">Choose a file&hellip;</span></label>
                        @if (isset($blog->image) && $blog->image)
                            {{ Html::image(asset('/img/'.$blog->image)) }}
                        @endif
                        {{ Form::label('image-placeholder', isset($blog->image) ? $blog->image :'None') }}

                        @if ($errors->has('image'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                </span>
                        @endif
                </div>
		</div>

		<div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
            <label for="meta_description" class="col-md-4 control-label">Meta</label>

            <div class="col-md-12">
                <textarea id="meta_description" class="form-control" name="meta_description" value="{{ isset($blog->meta_description) ? $blog->meta_description : '' }}" required autofocus>
										{{ isset($blog->meta_description) ? $blog->meta_description : '' }}
								</textarea>

                @if ($errors->has('meta_description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('meta_description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-4 control-label">Description</label>

            <div class="col-md-12">
				<div id="editor">
		             <textarea id='edit' name="description" style="margin-top: 30px;">{{ isset($blog->description) ? $blog->description : '' }}</textarea>
		        </div>
                <!-- <input id="description" type="hidden" class="form-control" name="description" value="{{ isset($blog->description) ? $blog->description :'' }}" required autofocus> -->

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

		<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
            <label for="category" class="col-md-4 control-label">Category 
            <a blogs-id="{{ isset($blog->id) ? $blog->id : 0 }}" onclick="Blogs.CreateCategory(this);return false;" class="btn im-btn lblue-btn" style="color:#fff">New Category</a></label>

				<div id="cat-update" class="table-section">
			        {!! view('admin.Blog.Posts.cat-update', [
			            'blog' => isset($blog) ? $blog : [],
									'categories' => isset($categories) ? $categories : [],
									'tags_ids' => isset($tags_ids) ? $tags_ids : [],
									'categories_used_ids' => isset($categories_used_ids) ? $categories_used_ids : [],
									'tags' => isset($tags) ? $tags : [],
									'tags_used' => isset($tags_used) ? $tags_used : [],
									'categories_used' => isset($categories_used) ? $categories_used : [],
			        ]) !!}

			     </div>
						
        </div>

				<div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
            <label for="tags" class="col-md-4 control-label">Tags</label>

            <div class="col-md-12">
                <input id="tags" type="text" class="form-control" name="tags" value="{{ isset($tags_ids) ? $tags_ids : '' }}" required autofocus>

                @if ($errors->has('tags'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tags') }}</strong>
                    </span>
                @endif
            </div>
        </div>

	    </fieldset>


{!! Form::close() !!}
</div>
