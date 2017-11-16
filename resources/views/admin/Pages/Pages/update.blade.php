<div id="updatePage" title="Content Editor">
	  {!! Form::open( ['method' => 'POST', 'id' => 'editPageInfoForm', 'files' => true ] ) !!}
	    <fieldset>
        {{ csrf_field() }}
				<input type="hidden" name="id" value="{{ isset($page->id) ? $page->id : 0 }}">

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-12 control-label">Title</label>

            <div class="col-md-12">
                <input id="title" type="text" class="form-control" name="title" value="{{ isset($page->title) ? $page->title :'' }}" required autofocus>

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-12 control-label">Content</label>

            <div class="col-md-12">
				<div id="editor">
					<textarea id="description" name="description">{{ isset($page->description) ? $page->description :'' }}</textarea>
				</div>

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('page') ? ' has-error' : '' }}">
            <label for="page" class="col-md-12 control-label">Page</label>

            <div class="col-md-12">
              <select id="page" name="page" class="form-control" required="" autofocus="">
					<option value="0">Select</option>
					@if ($pages)
						@foreach ($pages as $pag)
							<option {{ $pag && $page && $pag->id == $page->page_id ? 'selected="selected"' : '' }} value="{{ $pag->id }}">{{ $pag->name }}</option>
						@endforeach
					@endif
					<option value="all">All</option>
				</select>
                @if ($errors->has('page'))
                    <span class="help-block">
                        <strong>{{ $errors->first('page') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('section') ? ' has-error' : '' }}">
            <label for="section" class="col-md-12 control-label">Section</label>

            <div class="col-md-12">
              <select id="section" name="section" class="form-control" required="" autofocus="">
								@if ($role == 'admin')
                	<option {{ $page && $page->section == 0 ? 'selected="selected"' : '' }} value="0">Select</option>

                	<option {{ $page && $page->section == 'recommended_practice' ? 'selected="selected"' : '' }} value="recommended_practice">Recommended Best Practice (RBP)</option>
								@endif
                <option {{ $page && $page->section == 'diff_practice' ? 'selected="selected"' : '' }} value="diff_practice">How our Practice differs from RBP</option>
								@if ($role == 'admin')
	                <option {{ $page && $page->section == 'checklist' ? 'selected="selected"' : '' }} value="checklist">Checklists</option>
	                <option {{ $page && $page->section == 'templates' ? 'selected="selected"' : '' }} value="templates">Templates (specific to each section)</option>
	                <option {{ $page && $page->section == 'faq' ? 'selected="selected"' : '' }} value="faq">FAQs</option>
	                <option {{ $page && $page->section == 'ressources' ? 'selected="selected"' : '' }} value="ressources">Resources</option>
								@endif
              </select>

                @if ($errors->has('section'))
                    <span class="help-block">
                        <strong>{{ $errors->first('section') }}</strong>
                    </span>
                @endif
            </div>
        </div>

		<div class="form-group{{ $errors->has('practice') ? ' has-error' : '' }}">
			<div style="padding: 0 15px;">
				<label for="section" class="col-md-12 control-label im-label bg-lblue im-white">
					Practices
				</label>
			    <!-- <select id="category" name="category" class="form-control" multiple required autofocus> -->
					@if (isset($practices) && $practices && isset($page->permission) && $page->permission == 'all')

					@foreach ($practices as $practice)
						<div class="control-group">
							<div class="controls">
								<input id="{{ $practice->name }}" type="checkbox" name="practice[]" value="{{ $practice->id }}"><label for="{{ $practice->name }}">{{ $practice->name }}<span></span></label>
							</div>
						</div>
						<!-- <option value="{{ $practice->system_name }}">{{ $practice->name }}</option> -->
					@endforeach

							@if ($role == 'admin')
							<input id="all-practice" type="checkbox" name="practice[]" checked value="all-practice"><label for="all-practice">All<span></span></label>
							@endif
			    @elseif (isset($practices) && $practices)
			        @foreach ($practices as $practice)
			          <div class="control-group">
			            <div class="controls">
			              <input id="{{ $practice->name }}" type="checkbox" {{ in_array($practice->id, $practices_used_ids) ? 'checked' : '' }} name="practice[]" value="{{ $practice->id }}"><label for="{{ $practice->name }}">{{ $practice->name }}<span></span></label>
			            </div>
			          </div>
			          <!-- <option value="{{ $practice->system_name }}">{{ $practice->name }}</option> -->
			        @endforeach
							@if ($role == 'admin')
							<input id="all-practice" type="checkbox" name="practice[]" value="all-practice"><label for="all-practice">All<span></span></label>
							@endif
			    @endif
			    <!-- </select> -->

			    @if ($errors->has('practice'))
			        <span class="help-block">
			            <strong>{{ $errors->first('practice') }}</strong>
			        </span>
			    @endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
			<div style="padding: 0 15px;">
				<label for="section" class="col-md-12 control-label im-label bg-lblue im-white">Roles</label>
			    <!-- <select id="category" name="category" class="form-control" multiple required autofocus> -->
			    @if (isset($roles) && $roles)
			        @foreach ($roles as $role)
			          <div class="control-group">
			            <div class="controls">
			              <input id="{{ $role->name }}" type="checkbox" {{ in_array($role->id, $roles_ids) ? 'checked' : '' }} name="role[]" value="{{ $role->id }}"><label for="{{ $role->name }}">{{ $role->display_name }}<span></span></label>
			            </div>
			          </div>
			          <!-- <option value="{{ $role->system_name }}">{{ $role->name }}</option> -->
			        @endforeach
							<input id="all-role" type="checkbox" name="role[]" value="all-role"><label for="all-role">All<span></span></label>
			    @endif
			    <!-- </select> -->

			    @if ($errors->has('role'))
			        <span class="help-block">
			            <strong>{{ $errors->first('role') }}</strong>
			        </span>
			    @endif
			</div>
		</div>

	    </fieldset>
{!! Form::close() !!}
</div>
