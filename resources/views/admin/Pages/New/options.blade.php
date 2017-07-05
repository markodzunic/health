<div class="container">
	<div class="row">
		<div class="form-group">
		    <label for="title" class="col-md-4 control-label">Title</label>
		    <div class="col-md-12">
		        <input id="title" type="text" class="form-control" name="title" value="" required="" autofocus="">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="form-group">
		    <label for="description" class="col-md-4 control-label">Description</label>
		    <div class="col-md-12">
		        <textarea id="description" class="form-control" name="description" value="" required="" autofocus=""></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="form-group">
            <label for="page_select" class="col-md-4 control-label">Select Page</label>
            <div class="col-md-12">
                <select id="page_select" name="page_select" class="form-control" required="" autofocus="">
                  <option selected="&quot;selected&quot;" value="0"></option>
                  <option value="1">Data Protection</option>
                  <option value="2">Information Security</option>
                  <option value="3">Infection Prevention & Control</option>
                  <option value="4">Human Resources</option>
                  <option value="5">Health & Safety</option>
                  <option value="6">Emergency Planning</option>
                  <option value="7">Patient Management</option>
                  <option value="8">Practice Operations</option>
                  <option value="9">Clinical Management</option>
                </select>
            </div>
        </div>
	</div>
	<div class="row">
		<div class="form-group">
            <label for="section_select" class="col-md-4 control-label">Select section</label>
            <div class="col-md-12">
                <select id="section_select" name="section_select" class="form-control" required="" autofocus="">
                  <option selected="&quot;selected&quot;" value="0"></option>
                  <option value="1">Recommended Best Practice (RBP)</option>
                  <option value="2">How our Practice differs from RBP</option>
                  <option value="3">Checklists</option>
                  <option value="4">Templates (specific to each section)</option>
                  <option value="5">FAQs</option>
                  {{-- <option value="6">123</option> --}}
                </select>
            </div>
        </div>
	</div>	
</div>