<section id="practice-admins" class="small-padding no-padding-top">
	<div class="container">
		<div class="form-box editable-info">
			<div class="row">
			    <div class="col-md-12">

			    	<div class="box-header">
						<div class="box-title">
							<h3>Practice Administrator</h3>
						</div>
					</div>
					<div class="box-content" align="center">
						<div class="row">
								@if ($admin_users)
									@foreach ($admin_users as $admin)
									<div class="col-md-4">
							        	<div class="image-container">
							        		<img src="{{ asset('/img/'.$admin->avatar) }}" alt="" style="max-width:200px; border-radius: 50%;">
							        	</div>
								        <div align="center">
								        	<div class="user-name im-white bg-lblue h4 no-margin-bottom">{{ $admin->first_name }} {{ $admin->last_name }}</div>
								        	<div class="user-role bg-pink im-white"><strong>Practice Administrator</strong></div>
								        </div>
							        </div>
									@endforeach
								@endif
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
