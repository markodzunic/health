<style type="text/css">
	#PracticeStaff .col-sm-4{
		padding-left: 5px;
		padding-right: 5px;
		padding-bottom: 10px;
	}
	.user-box {
		border: 1px solid #fff;
		padding: 5px 5px 15px 5px;
		box-shadow: 2px 2px 6px rgba(255,255,255,.8);
	}
	.user-box img{
		width: 100%;
		border-radius: 50%;
		/*border:1px solid #ff66ff;*/
	}
	.box-content {
		width: 100%;
		float: left;
	}
</style>
<div class="small-padding no-padding-top">	
	<div class="container">
		<div id="PracticeStaff" class="form-box editable-info bg-lblue white-text">

			<div class="box-header">
				<div class="box-title bg-pink white-text">
					<h3>Practice Staff</h3>
				</div>
			</div>

			<div class="box-content">
				@if ($practice_users)
					@foreach ($practice_users as $usr)
						<div class="col-sm-4">
							<a href="#">
								<div class="user-box bg-white" align="center">
									<div class="image-wrapper">
										{{ Html::image(asset('/img/'.$usr->avatar)) }}
									</div>
									<div class="user-info im-blue">
										<div class="user-name">{{ $usr->first_name?:''}} {{ $usr->last_name?:''}}</div>
										<div class="user-role"><strong>{{ $usr->role->display_name?: '' }}</strong></div>
									</div>
								</div>
							</a>
						</div>
					@endforeach
				@endif
			</div>
			<div class="box-content">
				<div class="row">
					<div class="col-md-12" align="right" class="white-text">
						<p>Curenly available slots for new users <span class="bg-pink" style="    padding: 0 5px;">{{ $limit }}</span><br />
						If you wish to request additional users, then please click <a href="#" class="im-pink">here</a>.</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
