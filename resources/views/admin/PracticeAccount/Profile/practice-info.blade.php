<section id="practice-info" class="small-padding">
	<div class="container">
	@if (!empty($practice))
		<div class="form-box editable-info" style="border-bottom: 0;">
			<div class="box-header">
				<div class="user-image">
			        <img src="{{ asset('/img/'.$practice->avatar) }}" alt="">
			    </div>
				<div class="box-title">
					<h3><span>{{ $practice->name?:'N/A' }}</span></h3>
				</div>
				<div class="box-controles">
					<ul>
						<li><div class="btn im-btn pink-btn" practices-id="{{ $practice->id }}" onclick="Practices.Update(this);return false;">
							<i class="fa fa-edit" aria-hidden="true"></i>
							<div class="im-btn-info">Edit Info</div>
						</div></li>
						<li><div class="btn im-btn pink-btn"  practices-id="{{ $practice->id }}" onclick="Practices.UpdateAdmin(this);return false;">
							<i class="fa fa-cog" aria-hidden="true"></i>
							<div class="im-btn-info">Administrator Settings</div>
						</div></li>
						<li><div class="btn im-btn pink-btn" practice-id="{{ $practice->id }}" onclick="Users.Update(this,'');return false;">
							<i class="fa fa-user-plus" aria-hidden="true"></i>
							<div class="im-btn-info">Add User</div>
						</div></li>
						<li><div class="btn im-btn pink-btn"  practices-id="{{ $practice->id }}" onclick="Practices.Delete(this);return false;">
							<i class="fa fa-trash" aria-hidden="true"></i>
							<div class="im-btn-info">Delete Account</div>
						</div></li>
					</ul>
				</div>
			</div>
			<div class="box-content">
				<div class="row">
					<div class="col-md-6">
						<h4>Practice Information</h4>
						<p><i class="fa fa-map-marker"><span>Address</span></i>{{ $practice->address?:'N/A' }}</p>
						<p><i class="fa fa-user"><span>Practice Manager</span></i>{{ $user->first_name?:'N/A' }} {{ $user->last_name?:'N/A' }}</p>
					</div>
					<div class="col-md-6 border-left">
						<h4>Contact us</h4>
						<p><i class="fa fa-phone"><span>Telephone</span></i>{{ $user->phone?:'N/A' }}</p>
						<p><i class="fa fa-fax"><span>Fax</span></i>{{ $practice->fax?:'N/A' }}</p>
						<p><i class="fa fa-envelope"><span>Email</span></i>{{ $practice->email?:'N/A' }}</p>
						<p><i class="fa fa-globe"><span>Website</span></i>{{ $practice->site?:'N/A' }}</p>
					</div>
				</div>
			</div>
			<div class="col-md-12 bg-white">
				<div class="box-content-separator"></div>
			</div>
		</div>
	@endif
