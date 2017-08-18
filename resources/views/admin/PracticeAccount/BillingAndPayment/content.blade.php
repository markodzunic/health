<section id="practice-info" class="small-padding">
	<div id="billing" class="container">
		@if ($practice && !empty($practice))
			<div class="form-box editable-info">
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
							<li><div class="btn im-btn pink-btn" practice-id="{{ $practice->id }}" onclick="">
								<i class="fa fa-euro" aria-hidden="true"></i>
								<div class="im-btn-info">Update Billing Info</div>
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
					<div class="row">
						<div class="col-md-6  border-right">
							<h4>Practice Information</h4>
							<p><i class="fa fa-map-marker"><span>Address</span></i>{{ $practice->address?:'N/A' }}</p>
							<p><i class="fa fa-user"><span>Practice Manager</span></i>{{ $user->first_name?:'N/A' }} {{ $user->last_name?:'N/A' }}</p>
							<p><i class="fa fa-certificate"><span>Subscription</span></i><strong>Subscription: </strong>{{ isset($subscription->subscription) ? strtoupper($subscription->subscription) : 'None' }}</p>
							<p><i class="fa fa-calendar"><span>Contracted Term</span></i><strong>Contracted Term: </strong> {{ \Carbon\Carbon::parse($practice->created_at)->format('d-m-Y') }} – {{ \Carbon\Carbon::parse($practice->created_at)->addYear()->format('d-m-Y') }}</p>
							<p><i class="fa fa-users"><span>Plan</span></i><strong>Your plan includes: </strong> 7 authorised users. Left: {{ $limit }}</p>
							<p><i class="fa fa-euro"><span>Next Billing Date</span></i><strong>Next Billing Date: </strong> {{ \Carbon\Carbon::parse($practice->created_at)->addYear()->format('d-m-Y') }}</p>
						</div>
						<div class="col-md-6">
							<h4>Contact Information</h4>
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

				<div class="box-content">
					<div class="row">
						<div class="col-md-12">
							<h4>Billing Address</h4>
							<div class="row billing-info">
								<div class="col-md-6">
									<p><strong>First Name: </strong></p>
								</div>
								<div class="col-md-6">
									<p><strong>Last Name: </strong></p>
								</div>
								<div class="col-md-12">
									<p><strong>Company Name: </strong></p>
								</div>
								<div class="col-md-6">
									<p><strong>Country: </strong></p>
								</div>
								<div class="col-md-6">
									<p><strong>Street address: </strong></p>
								</div>
								<div class="col-md-6">
									<p><strong>Street address 2: </strong></p>
								</div>
								<div class="col-md-6">
									<p><strong>Town / City: </strong></p>
								</div>
								<div class="col-md-6">
									<p><strong>State: </strong></p>
								</div>
								<div class="col-md-6">
									<p><strong>Postcode: </strong></p>
								</div>
								<div class="col-md-6">
									<p><strong>Phone: </strong></p>
								</div>
								<div class="col-md-6">
									<p><strong>Email address: </strong></p>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		@endif
</section>
