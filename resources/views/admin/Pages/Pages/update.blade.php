<div id="updatePage" title="Edit Page">
	  {!! Form::open( ['method' => 'POST', 'id' => 'editPageInfoForm', 'files' => true ] ) !!}
	    <fieldset>
        {{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $page->id }}">

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">Title</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="{{ $page->title?:'' }}" required autofocus>

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
                <input id="description" type="text" class="form-control" name="description" value="{{ $page->description?:'' }}" required autofocus>

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
                  <option {{ $page->page == 0 ? 'selected="selected"' : '' }} value="0">Select</option>
                  <option {{ $page->page == 'data_protection' ? 'selected="selected"' : '' }} value="data_protection">Data Protection</option>
                  <option {{ $page->page == 'information_security' ? 'selected="selected"' : '' }} value="information_security">Information Security</option>
                  <option {{ $page->page == 'infection_prevention' ? 'selected="selected"' : '' }} value="infection_prevention">Infection Prevention & Control</option>
                  <option {{ $page->page == 'human_resources' ? 'selected="selected"' : '' }} value="human_resources">Human Resources</option>
                  <option {{ $page->page == 'health_safety' ? 'selected="selected"' : '' }} value="health_safety">Health & Safety</option>
                  <option {{ $page->page == 'emergency_planning' ? 'selected="selected"' : '' }} value="emergency_planning">Emergency Planning</option>
                  <option {{ $page->page == 'patient_management' ? 'selected="selected"' : '' }} value="patient_management">Patient Management</option>
                  <option {{ $page->page == 'practice_operations' ? 'selected="selected"' : '' }} value="practice_operations">Practice Operations</option>
                  <option {{ $page->page == 'clinical_management' ? 'selected="selected"' : '' }} value="clinical_management">Clinical Management</option>
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
                <option {{ $page->section == 0 ? 'selected="selected"' : '' }} value="0">Select</option>
                <option {{ $page->section == 'recommended_practice' ? 'selected="selected"' : '' }} value="recommended_practice">Recommended Best Practice (RBP)</option>
                <option {{ $page->section == 'diff_practice' ? 'selected="selected"' : '' }} value="diff_practice">How our Practice differs from RBP</option>
                <option {{ $page->section == 'checklist' ? 'selected="selected"' : '' }} value="checklist">Checklists</option>
                <option {{ $page->section == 'templates' ? 'selected="selected"' : '' }} value="templates">Templates (specific to each section)</option>
                <option {{ $page->section == 'faq' ? 'selected="selected"' : '' }} value="faq">FAQs</option>
                {{-- <option value="6">123</option> --}}
              </select>

                @if ($errors->has('section'))
                    <span class="help-block">
                        <strong>{{ $errors->first('section') }}</strong>
                    </span>
                @endif
            </div>
        </div>

	    </fieldset>
{!! Form::close() !!}
</div>
