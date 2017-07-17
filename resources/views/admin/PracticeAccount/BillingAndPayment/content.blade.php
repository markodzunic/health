<section id="practice-info">
	<div id="billing" class="container">
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
							<li><div class="btn im-btn pink-btn" practice-id="{{ $practice->id }}" onclick="">
								<i class="fa fa-credit-card" aria-hidden="true"></i>
								<div class="im-btn-info">View Payment History</div>
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
				<div class="box-content bg-lblue">
						<div class="h3"><span class="im-white">Your Subscription:</span>
						<span class="bg-white" style="padding: 10px">
							<span class="im-lblue">{{ strtoupper($subscription->subscription) }}</span>
						</span></div>
						<p class="no-margin-bottom im-white"><strong>Contracted Term: </strong> {{ \Carbon\Carbon::parse($practice->created_at)->format('d-m-Y') }} – {{ \Carbon\Carbon::parse($practice->created_at)->addYear()->format('d-m-Y') }}</p>
						<div class="separator-line bg-white"></div>
						<p class="no-margin-bottom im-white"><strong>Your plan includes: </strong> 7 authorised users. Left: {{ $limit }}</p>
						<div class="separator-line bg-white"></div>
						<p class="no-margin-bottom im-white"><strong>Next Billing Date: </strong> {{ \Carbon\Carbon::parse($practice->created_at)->addYear()->format('d-m-Y') }}</p>
					</div>
				</div>
			</div>
		@endif
</section>
