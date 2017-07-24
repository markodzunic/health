<div id="updatePage" title="Edit Page">
	  {!! Form::open( ['method' => 'POST', 'id' => 'editPageInfoForm', 'files' => true ] ) !!}
	    <fieldset>
        {{ csrf_field() }}
				<input type="hidden" name="id" value="{{ isset($page->id) ? $page->id : 0 }}">

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">Title</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="{{ isset($page->title) ? $page->title :'' }}" required autofocus>

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-4 control-label">Description</label>

            <div class="col-md-6">
                <input id="description" type="text" class="form-control" name="description" value="{{ isset($page->description) ? $page->description :'' }}" required autofocus>

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('page') ? ' has-error' : '' }}">
            <label for="page" class="col-md-4 control-label">Page</label>

            <div class="col-md-6">
              <select id="page" name="page" class="form-control" required="" autofocus="">
                  <option {{ $page && $page->page == 0 ? 'selected="selected"' : '' }} value="0">Select</option>
                  <option {{ $page && $page->page == 'data_protection' ? 'selected="selected"' : '' }} value="data_protection">Data Protection</option>
                  <option {{ $page && $page->page == 'information_security' ? 'selected="selected"' : '' }} value="information_security">Information Security</option>
                  <option {{ $page && $page->page == 'infection_prevention' ? 'selected="selected"' : '' }} value="infection_prevention">Infection Prevention & Control</option>
                  <option {{ $page && $page->page == 'human_resources' ? 'selected="selected"' : '' }} value="human_resources">Human Resources</option>
                  <option {{ $page && $page->page == 'health_safety' ? 'selected="selected"' : '' }} value="health_safety">Health & Safety</option>
                  <option {{ $page && $page->page == 'emergency_planning' ? 'selected="selected"' : '' }} value="emergency_planning">Emergency Planning</option>
                  <option {{ $page && $page->page == 'patient_management' ? 'selected="selected"' : '' }} value="patient_management">Patient Management</option>
                  <option {{ $page && $page->page == 'practice_operations' ? 'selected="selected"' : '' }} value="practice_operations">Practice Operations</option>
                  <option {{ $page && $page->page == 'clinical_management' ? 'selected="selected"' : '' }} value="clinical_management">Clinical Management</option>
              </select>

                @if ($errors->has('page'))
                    <span class="help-block">
                        <strong>{{ $errors->first('page') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('section') ? ' has-error' : '' }}">
            <label for="section" class="col-md-4 control-label">Section</label>

            <div class="col-md-6">
              <select id="section" name="section" class="form-control" required="" autofocus="">
                <option {{ $page && $page->section == 0 ? 'selected="selected"' : '' }} value="0">Select</option>
                <option {{ $page && $page->section == 'recommended_practice' ? 'selected="selected"' : '' }} value="recommended_practice">Recommended Best Practice (RBP)</option>
                <option {{ $page && $page->section == 'diff_practice' ? 'selected="selected"' : '' }} value="diff_practice">How our Practice differs from RBP</option>
                <option {{ $page && $page->section == 'checklist' ? 'selected="selected"' : '' }} value="checklist">Checklists</option>
                <option {{ $page && $page->section == 'templates' ? 'selected="selected"' : '' }} value="templates">Templates (specific to each section)</option>
                <option {{ $page && $page->section == 'faq' ? 'selected="selected"' : '' }} value="faq">FAQs</option>
                {{-- <option value="6">123</option> --}}
              </select>

                @if ($errors->has('section'))
                    <span class="help-block">
                        <strong>{{ $errors->first('section') }}</strong>
                    </span>
                @endif
            </div>
        </div>

				<div class="form-group{{ $errors->has('practice') ? ' has-error' : '' }}">
					<label for="section" class="col-md-4 control-label">Practices</label>
				    <!-- <select id="category" name="category" class="form-control" multiple required autofocus> -->
				    @if (isset($practices) && $practices)
				        @foreach ($practices as $practice)
				          <div class="control-group">
				            <div class="controls">
				              <input id="{{ $practice->name }}" type="checkbox" {{ in_array($practice->id, $practices_used_ids) ? 'checked' : '' }} name="practice[]" value="{{ $practice->id }}"><label for="{{ $practice->name }}">{{ $practice->name }}<span></span></label>
				            </div>
				          </div>
				          <!-- <option value="{{ $practice->system_name }}">{{ $practice->name }}</option> -->
				        @endforeach
				    @endif
				    <!-- </select> -->

				    @if ($errors->has('practice'))
				        <span class="help-block">
				            <strong>{{ $errors->first('practice') }}</strong>
				        </span>
				    @endif
				</div>

				<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
					<label for="section" class="col-md-4 control-label">Roles</label>
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
				    @endif
				    <!-- </select> -->

				    @if ($errors->has('role'))
				        <span class="help-block">
				            <strong>{{ $errors->first('role') }}</strong>
				        </span>
				    @endif
				</div>

	    </fieldset>
{!! Form::close() !!}
</div>
