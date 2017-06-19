<div id="personal-info" class="small-padding no-padding-top">
	<div class="row">
	    	<div class="col-md-12">
	        <h4><strong>Personal Information</strong></h4>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="PersonalInfo" class="form-box editable-info bg-lblue white-text">
				{{-- Title --}}
				<div id="Personal-Title" class="personal-info-field editable-field">
					<div>Title</div>
					<div>{{ $user->title }}</div>
				</div>
				{{-- First Name	 --}}
				<div id="Personal-FirstName" class="personal-info-field editable-field">
					<div>First Name</div>
					<div>{{ $user->first_name }}</div>
				</div>
				{{-- Surname --}}
				<div id="Personal-Surname" class="personal-info-field editable-field">
					<div>Surname</div>
					<div>{{ $user->last_name }}</div>
				</div>
				{{-- Date of Birth --}}
				<div id="Personal-DateOfBirth" class="personal-info-field editable-field">
					<div>Date of Birth</div>
					<div>{{ $user->date_of_birth }}</div>
				</div>
				{{-- Gender --}}
				<div id="Personal-Gender" class="personal-info-field editable-field">
					<div>Gender</div>
					<div>{{ $user->gender }}</div>
				</div>
				{{-- Role --}}
				<div id="Personal-Role" class="personal-info-field editable-field">
					<div>Role</div>
					<div>
							{{ $role->display_name }}
					</div>
				</div>
				{{-- Position Type (Full-time or Part-time) --}}
				<div id="Personal-PositionType" class="personal-info-field editable-field">
					<div>Position Type</div>
					<div>{{ $user->position_type }}</div>
				</div>
				{{-- Registration Number--}}
				<div id="Personal-RegNumber" class="personal-info-field editable-field">
					<div>Registration Number</div>
					<div>{{ $user->med_reg_number }}</div>
				</div>
				<div align="right">
					<button type="button" class="btn im-btn pink-btn" onclick="Profile.OpenProfile([]);return false;">Edit Info</button>
				</div>
			</div>
		</div>
	</div>
</div>
