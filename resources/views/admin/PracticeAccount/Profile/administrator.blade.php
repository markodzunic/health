<div id="practice-admins" class="form-box editable-info" style="border-top: 0; border-bottom: 0;">
	<div class="box-content" >
		<div class="row">
			<div class="col-md-12">
				<h4>Practice Administrator</h4>
				<div class="row" align="center">
						@if ($admin_users)
							@foreach ($admin_users as $admin)
							<div class="col-md-4">
					        	<div class="image-container practice-user">
					        		<img src="{{ asset('/img/'.$admin->avatar) }}" alt="" style="max-width:200px; border-radius: 50%;">
					        	</div>
						        <div align="center">
						        	<div class="user-name h4 no-margin-bottom">{{ $admin->first_name }} {{ $admin->last_name }}</div>
						        	<div class="user-role"><strong>Practice Administrator</strong></div>
						        	<a href="#" class="im-lblue" style="font-size: 12px;">Send Message</a>
						        </div>
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
