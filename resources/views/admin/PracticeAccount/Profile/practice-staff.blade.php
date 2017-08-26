		<div id="PracticeStaff" class="form-box editable-info" style="border-top: 0;">
			<div class="box-content">
				<div class="row">
					<div class="col-md-12">
						<h4>Practice Staff</h4>					
						<div class="row">
							@if ($practice_users)
								@foreach ($practice_users as $usr)
									<div class="col-sm-4">
										<a href="#">
											<div class="user-box bg-white" align="center">
												<div class="image-wrapper practice-user">
													{{ Html::image(asset('/img/'.$usr->avatar)) }}
												</div>
												<div class="user-info im-blue">
													<div class="user-name h4 no-margin-bottom">{{ $usr->first_name?:''}} {{ $usr->last_name?:''}}</div>
													<div class="user-role"><strong>{{ $usr->role->display_name?: '' }}</strong></div>
													<a href="#" class="im-lblue" style="font-size: 12px;">Send Message</a>
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

			<div class="box-content" style="padding-bottom: 15px;">
				<div class="row">
					<div class="col-md-12" align="right"">
						<p class="no-margin-bottom">Curenly available slots for new users <span class="bg-pink im-white" style="padding: 0 5px;border-radius: 50%;">{{ $limit }}</span><br />
						If you wish to request additional users, then please click <a href="{{ URL::to('/contact') }}" class="im-pink">here</a>.</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
