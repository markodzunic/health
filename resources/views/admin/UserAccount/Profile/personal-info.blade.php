<section id="personal-info" class="small-padding no-padding-top">
	<div class="container">
		<div id="PersonalInfo" class="form-box editable-info">
			<div class="box-header">
				<div class="box-title">
					<h3>Personal Information</h3>
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
				<div class="personal-image">
			        <img src="{{ asset('/img/'.Auth::user()->avatar) }}" alt="">
			    </div>
				<div class="prfile-info">
					<h4>
						<span class="im-pink">{{ $user->title }}</span>
						<span class="im-lblue">{{ $user->first_name }}</span>
						<span class="im-lblue">{{ $user->last_name }}</span>
					</h4>
					<p><strong>Date of Birth: </strong>{{ $user->date_of_birth }}</p>
					<p><strong>Gender: </strong>{{ $user->gender }}</p>
					<p><strong>Role: </strong>{{ $role->display_name }}</p>
					<p><strong>Position Type: </strong>{{ $user->position_type }}</p>
					<p><strong>Phone: </strong>{{ $user->phone }}</p>
					<p><strong>Email: </strong>{{ $user->email }}</p>
					<p><strong>Registration Number: </strong>{{ $user->med_reg_number }}</p>
				</div>
			</div>
		</div>
	</div>
</section>
