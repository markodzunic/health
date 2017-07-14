<section id="practice-info" class="small-padding no-padding-top">
	<div class="container">
	@if (!empty($practice))
		<div class="form-box editable-info">
			<div class="box-header">
				<div class="box-title">
					<h3>Practice Information</h3>
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
				<div class="personal-image">
			        <img src="{{ asset('/img/'.$practice->avatar) }}" alt="">
			    </div>
				<div class="prfile-info">
					<h4>
						<span class="im-lblue">{{ $practice->name?:'N/A' }}</span>
					</h4>
					<p><strong>Address: </strong>{{ $practice->address?:'N/A' }}</p>
					<p><strong>Telephone: </strong>{{ $user->phone?:'N/A' }}</p>
					<p><strong>Fax: </strong>{{ $practice->fax?:'N/A' }}</p>
					<p><strong>Email Address: </strong>{{ $practice->email?:'N/A' }}</p>
					<p><strong>Website: </strong>{{ $practice->site?:'N/A' }}</p>
					<p><strong>Practice Manager: </strong>{{ $user->first_name?:'N/A' }} {{ $user->last_name?:'N/A' }}</p>
				</div>
			</div>
		</div>
	@endif
	</div>
</section>
