<div id="practice-admins" class="small-padding no-padding-top">
	<div class="container">
		<div class="form-box editable-info bg-lblue">
			<div class="row">
			    <div class="col-md-12">

			    	<div class="box-header">
						<div class="box-title bg-pink white-text">
							<h3>Practice Administrator</h3>
						</div>
					</div>
					<div class="image-wrapper bg-white pull-left" style="margin: 30px auto" align="center">
							@if ($admin_users)
								@foreach ($admin_users as $admin)
						        <a href="#">
						        	<img src="{{ asset('/img/'.$admin->avatar) }}" alt="">
							        <br>
							        <p class="im-lblue">{{ $admin->first_name }} {{ $admin->last_name }}</p>
						        </a>
								@endforeach
							@endif
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
