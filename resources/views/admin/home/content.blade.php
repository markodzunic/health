<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<section class="box-grid">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-6" style="padding: 0;">
								<div class="bg-grey grid-col-content im-left no-split" id="Date">
									<span class="h3 no-margin-bottom">26th July 2017</span><br />
									<span class="h5 no-margin-bottom">Sunday</span>
								</div>
							</div>
							<div class="col-md-6" style="padding: 0;">
								<div class="bg-grey grid-col-content im-right no-split"  id="weather">
								</div>
							</div>
						</div>
					</div>
					@if ($role !== 'newuser')
					<div class="row">
						<div class="col-md-6">
							<a href="{{ URL::to('/my_knowledge_box') }}" class="im-lblue">
								<div class="bg-grey grid-col-content">
									<strong>My Knowledge Box</strong>
								</div>
							</a>
						</div>
						<div class="col-md-6">
							<a href="#" class="im-blue">
								<div class="bg-grey grid-col-content">
									<strong>Classifieds</strong>
								</div>
							</a>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<a href="#" class="im-pink">
								<div class="bg-grey grid-col-content">
									<strong>Provider Directory</strong>
								</div>
							</a>
						</div>

						<div class="col-md-6">
							<a href="#" class="im-lgreen">
								<div class="bg-grey grid-col-content">
									<strong>iLearning</strong>
								</div>
							</a>
						</div>
					</div>
					@endif

					
				</div>
			</section>

		</div>
		<div class="col-md-3">
			@if ($role == 'newuser')
					<div class="row">
						<div class="col-md-12">
							<div class="bg-grey grid-col-content no-split im-left im-scroller" style="height: 250px; overflow-y: scroll;">
								<strong>News & Announcements</strong>
								<div style="height: 20px;"></div>
								@if ($notifications)
									@foreach ($notifications as $notification)
										<div class="im-notification im-new">
												<div class="notification-title bg-lblue">
													<a href="#" class="im-white">{{ $notification->title }}</a>
												</div>
												<div class="im-notification-content">
													<div class="im-lblue">
														<strong>{{ $notification->type == 'blog' ? $notification->category : $notification->pg_name. ' - '.$notification->category }}</strong>
													</div>
													<div class="not-autor"><i class="fa fa-user"></i> <span>{{ $notification->user_name }}</span></div>
													<div class="not-date"><i class="fa fa-clock-o"></i> <span>{{ $notification->created_at }}</span></div>
												</div>
										</div>
									@endforeach
								@endif
							</div>
						</div>
					</div>
					@endif

					@if ($role !== 'newuser')
					<div class="row">
						<div class="col-md-12">
							<div class="bg-grey grid-col-content no-split im-left im-scroller" style="height: 250px; overflow-y: scroll;">
								<strong>News & Announcements</strong>
								<div style="height: 20px;"></div>
								@if ($notifications)
									@foreach ($notifications as $notification)
										<div class="im-notification im-new">
												<div class="notification-title bg-lblue">
													<a href="#" class="im-white">{{ $notification->title }}</a>
												</div>
												<div class="im-notification-content">
													<div class="im-lblue">
														<strong>{{ $notification->type == 'blog' ? $notification->category : $notification->pg_name. ' - '.$notification->category }}</strong>
													</div>
													<div class="not-autor"><i class="fa fa-user"></i> <span>{{ $notification->user_name }}</span></div>
													<div class="not-date"><i class="fa fa-clock-o"></i> <span>{{ $notification->created_at }}</span></div>
												</div>
										</div>
									@endforeach
								@endif
							</div>
						</div>
					</div>
					@endif
		</div>
	</div>
</div>