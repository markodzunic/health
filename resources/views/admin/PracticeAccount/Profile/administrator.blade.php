<div id="practice-admins" class="form-box editable-info" style="border-top: 0; border-bottom: 0;">
	<div class="box-content" >
		<div class="row">
			<div class="col-md-12">
				<h4>Practice Administrator</h4>
				<div class="row" align="center">
						@if ($admin_users)
							@foreach ($admin_users as $admin)
							<div class="col-md-4">
								<a href="#" class="show-additional-content">
						        	<div class="image-container practice-user">
						        		<img src="{{ asset('/img/'.$admin->avatar) }}" alt="" style="max-width:200px; border-radius: 50%;">
						        	</div>
							        <div align="center">
							        	<div class="user-name h4 no-margin-bottom">{{ $admin->first_name }} {{ $admin->last_name }}</div>
							        	<div class="user-role"><strong>{{ $admin->role->display_name }}</strong></div>
							        	<a href="#" class="im-lblue" style="font-size: 12px;">Send Message</a>
							        </div>
						        </div>
						        <div class="user-aditional-info im-left">
									<div  class="additiontal-wrapper">
										<div class="container">
											<div class="form-box editable-info">
												<div class="box-header">
													<div class="user-image">
												        {{ Html::image(asset('/img/'.$admin->avatar)) }}
												    </div>
													<div class="box-title">
														<h3>
															<span style="text-transform: uppercase;">{{ $admin->title?:''}}</span>
															<span>{{ $admin->first_name?:''}}</span>
															<span>{{ $admin->last_name?:''}}</span>
														</h3>
													</div>
													<div class="box-controles">
														<a href="#" class="hide-additional-content">
															<i class="fa fa-close" aria-hidden="true"></i>
														</a>
													</div>
												</div>
												<div class="box-content">
													<div class="row">
														<div class="col-md-6 border-right">
															<h4>Personal Information</h4>
															<p><i class="fa fa-user"><span>Position Type</span></i>{{ $admin->position_type?:'' }}</p>
															<p><i class="fa fa-birthday-cake"><span>Date of Birth</span></i>{{ $admin->date_of_birth?:'' }}</p>
															<p><i class="fa fa-venus-mars"><span>Gender</span></i>{{ $admin->gender?:'' }}</p>
															<p><i class="fa fa-registered"><span>Registration Number</span></i>{{ $admin->med_reg_number?:'' }}</p>
														</div>
														<div class="col-md-6">
															<h4>Contact me</h4>
															<p><i class="fa fa-phone"><span>Phone</span></i>{{ $admin->phone?:'' }}</p>
															<p><i class="fa fa-envelope"><span>Email</span></i>{{ $admin->email?:'' }}</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</a>
							</div>
							@endforeach
						@endif
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 bg-white">
		<div class="box-content-separator"></div>
	</div>
</div>
