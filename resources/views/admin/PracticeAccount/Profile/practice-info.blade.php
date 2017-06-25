<div class="small-padding no-padding-top">
	<div class="row">
	    	<div class="col-md-12">
	        <h4><strong>Practice Information</strong></h4>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="practice-info" class="form-box editable-info bg-lblue white-text">
				{{-- Practice Name  --}}
				<div id="practice-name" class="personal-info-field editable-field">
					<div>Practice Name</div>
					<div>{{ $practice->name?:'N/A' }}</div>
				</div>
				{{-- Address --}}
				<div id="practice-address" class="personal-info-field editable-field">
					<div>Address</div>
					<div>{{ $practice->address?:'N/A' }}</div>
				</div>
				{{-- Telephone --}}
				<div id="practice-telephone" class="personal-info-field editable-field">
					<div>Telephone</div>
					<div>{{ $user->phone?:'N/A' }}</div>
				</div>
				{{-- Fax --}}
				<div id="practice-fax" class="personal-info-field editable-field">
					<div>Fax</div>
					<div>{{ $practice->fax?:'N/A' }}</div>
				</div>
				{{-- Email Address --}}
				<div id="practice-email" class="personal-info-field editable-field">
					<div>Email Address</div>
					<div>{{ $practice->email?:'N/A' }}</div>
				</div>
				{{-- Website --}}
				<div id="practice-website" class="personal-info-field editable-field">
					<div>Website</div>
					<div>{{ $practice->site?:'N/A' }}</div>
				</div>
				{{-- Practice Manager --}}
				<div id="practice-manager" class="personal-info-field editable-field">
					<div>Practice Manager</div>
					<div>{{ $user->first_name?:'N/A' }} {{ $user->last_name?:'N/A' }}</div>
				</div>
				<div align="right">
					<button class="btn im-btn pink-btn" data-toggle="modal" data-target="#editPracticeInfo">Edit Info</button>
				</div>
			</div>
		</div>
	</div>
</div>
