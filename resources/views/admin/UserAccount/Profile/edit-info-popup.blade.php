
<!-- Modal -->
<div id="editUserInfo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="small-padding no-padding-top">
		<div class="row">
		    <div class="col-md-12">
		        <h4><strong>Update Your Profile</strong></h4>
		    </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-box no-borders no-box-shadow">					
					<label for="">
						<span class="im-blue">Title</span><br />
						<input type="text" id="title" name="title">
						@if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
					</label>
					
					<label for="">
						<span class="im-blue">First Name</span><br />
						<input type="text" id="first_name" name="first_name">
						@if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
					</label>
					
					<label for="">
						<span class="im-blue">Surname</span><br />
						<input type="text" id="surname" name="surname">
						@if ($errors->has('sname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('surname') }}</strong>
                            </span>
                        @endif
					</label>
					
					<label for="">
						<span class="im-blue">Date of Birth</span><br />
						<div class='input-group date' id='date_of_birth'>
                            <input type='text' name="date_of_birth" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
						@if ($errors->has('date_of_birth'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_of_birth') }}</strong>
                            </span>
                        @endif
					</label>
					
					<label for="">
						<span class="im-blue">Gender</span><br />
						<input type="text" id="gender" name="gender">
						@if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
					</label>
					
					<label for="">
						<span class="im-blue">Role</span><br />
						<input type="text" id="role" name="role">
						@if ($errors->has('role'))
                            <span class="help-block">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span>
                        @endif
					</label>
					
					<label for="">
						<span class="im-blue">Position Type</span><br />
						<input type="text" id="position_type" name="position_type">
						@if ($errors->has('position_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('position_type') }}</strong>
                            </span>
                        @endif
					</label>
					
					<label for="">
						<span class="im-blue">Registration Number</span><br />
						<input type="text" id="registration_number" name="registration_number">
						@if ($errors->has('registration_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('registration_number') }}</strong>
                            </span>
                        @endif
					</label><br /><br />
					<div align="right">
						<button type="button" class="btn im-btn pink-btn">Save</button>
						<button type="button" class="btn im-btn pink-btn"  data-dismiss="modal">Cancle</button>
					</div>
				</div>
			</div>
		</div>
	</div>
    </div>

  </div>
</div>