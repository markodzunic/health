<section id="personal-info" class="small-padding">
	<div class="container">
		<div id="PersonalInfo" class="form-box editable-info">
			<div class="box-header">
				<div class="user-image">
			        <img src="{{ asset('/img/'.Auth::user()->avatar) }}" alt="">
			    </div>
				<div class="box-title">
					<h3>
						<span style="text-transform: uppercase;">{{ $user->title }}</span>
						<span>{{ $user->first_name }}</span>
						<span>{{ $user->last_name }}</span>
					</h3>
				</div>
				<div class="box-controles">
					<ul>
						<li><div class="btn im-btn pink-btn no-margin-bottom" onclick="Profile.OpenProfile([]);return false;">
							<i class="fa fa-edit" aria-hidden="true"></i>
							<div class="im-btn-info">Edit Info</div>
						</div></li>
						<li><div class="btn im-btn pink-btn no-margin-bottom" onclick="Profile.UpdatePassword(this);return false;">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<div class="im-btn-info">Update Password</div>
						</div></li>
						<li><div class="btn im-btn pink-btn no-margin-bottom" onclick="Profile.DeleteDialog([]);return false;">
							<i class="fa fa-trash" aria-hidden="true"></i>
							<div class="im-btn-info">Delete Account</div>
						</div></li>
					</ul>
				</div>
			</div>
			<div class="box-content">
				<div class="row">
					<div class="col-md-6 border-right">
						<h4>Personal Information</h4>
						<p><i class="fa fa-user-md"><span>Role</span></i>{{ $role->display_name }}</p>
						<p><i class="fa fa-user"><span>Position Type</span></i>{{ $user->position_type }}</p>
						<p><i class="fa fa-birthday-cake"><span>Date of Birth</span></i>{{ $user->date_of_birth }}</p>
						<p><i class="fa fa-venus-mars"><span>Gender</span></i>{{ $user->gender }}</p>						
						<p><i class="fa fa-registered"><span>Registration Number</span></i>{{ $user->med_reg_number }}</p>
					</div>
					<div class="col-md-6">
						<h4>Contact me</h4>
						<p><i class="fa fa-phone"><span>Phone</span></i>{{ $user->phone }}</p>
						<p><i class="fa fa-envelope"><span>Email</span></i>{{ $user->email }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
