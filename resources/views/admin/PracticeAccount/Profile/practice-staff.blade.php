		<div id="PracticeStaff" class="form-box editable-info" style="border-top: 0;">
			<div class="box-content">
				<div class="row">
					<div class="col-md-12">
						<h4>Practice Staff</h4>
						<div class="row">
							@if ($practice_users)
								@foreach ($practice_users as $usr)
									<div class="col-sm-4">
										<a href="#" class="show-additional-content">
											<div class="user-box bg-white" align="center">
												<div class="image-wrapper practice-user">
													{{ Html::image(asset('/img/'.$usr->avatar)) }}
												</div>
												<div class="user-info im-blue">
													<div class="user-name h4 no-margin-bottom">{{ $usr->first_name?:''}} {{ $usr->last_name?:''}}</div>
													<div class="user-role"><strong>{{ $usr->role->display_name?: '' }}</strong></div>
													<a href="#" onclick="Users.SendMessage(this);return false;" users-id="{{ $usr->id }}" class="im-lblue" style="font-size: 12px;">Send Message</a>
												</div>
											</div>

											<div class="user-aditional-info">
												<div  class="additiontal-wrapper">
													<div class="container">
														<div class="form-box editable-info">
															<div class="box-header">
																<div class="user-image">
															        {{ Html::image(asset('/img/'.$usr->avatar)) }}
															    </div>
																<div class="box-title">
																	<h3>
																		<span style="text-transform: uppercase;">{{ $usr->title?:''}}</span>
																		<span>{{ $usr->first_name?:''}}</span>
																		<span>{{ $usr->last_name?:''}}</span>
																	</h3>
																</div>
																<div class="box-controles">
																	<a href="#" class="hide-additional-content">
																		<i class="fa fa-close" aria-hidden="true"></i>
																	</a>
																</div>
															</div>
															<div class="box-content im-scroller">
																<div class="row">
																	<div class="col-md-6 border-right">
																		<h4>Personal Information</h4>
																		<p><i class="fa fa-user"><span>Position Type</span></i>{{ $usr->position_type?:'' }}</p>
																		<p><i class="fa fa-birthday-cake"><span>Date of Birth</span></i>{{ $usr->date_of_birth?:'' }}</p>
																		<p><i class="fa fa-venus-mars"><span>Gender</span></i>{{ $usr->gender?:'' }}</p>
																		<p><i class="fa fa-registered"><span>Registration Number</span></i>{{ $usr->med_reg_number?:'' }}</p>
																	</div>
																	<div class="col-md-6">
																		<h4>Contact me</h4>
																		<p><i class="fa fa-phone"><span>Phone</span></i>{{ $usr->phone?:'' }}</p>
																		<p><i class="fa fa-envelope"><span>Email</span></i>{{ $usr->email?:'' }}</p>
																	</div>
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
			@if ($role == 'practice_manager' || $role == 'admin')
			<div class="box-content" style="padding-bottom: 15px;">
				<div class="row">
					<div class="col-md-12" align="right">
						<p class="no-margin-bottom">Curently available slots for new users <span class="bg-pink im-white" style="padding: 0 5px;border-radius: 50%;">{{ $limit }}</span><br />
						If you wish to request additional users, then please click <a href="{{ URL::to('/contact') }}" class="im-pink">here</a>.</p>
					</div>
				</div>
			</div>
			@endif
		</div>
	</div>
</section>
