<style type="text/css">
	.form-box {
		width: 100%;
		float: left;
	}
	.personal-image {
		float: left;
		width: 200px;
		text-align: center;
		background: #fff;
	}
	.personal-image img {
		max-width: 100%;
		margin-bottom: 0;
	}
	.prfile-info {
		float: left;
		padding: 0 30px;
	}
	.prfile-info p {
		margin-bottom: 0;
	}
	.box-controles {
		float: right;
	}
	.box-header {
		float: left;
		width: 100%;
	}
	.box-title {
		float: left;
	}
	.box-title h3 {
		margin-bottom: 0;
		line-height: 40px;
		padding: 0 15px;
		text-transform: uppercase;
	}
	.box-controles ul li {
		display: inline-block;
	}
	.box-controles ul li > div {
	    padding: 0;
	    margin: 0;
	    min-width: 40px !important;
	    font-size: 20px;
	    line-height: 36px;
	    position: relative;
	}
	.im-btn-info {
		position: absolute;
	    right: 0;
	    font-size: 13px;
	    text-align: center;
	    top: 45px;
	    line-height: 1;
	    padding: 5px 10px;
	    background-color: rgba(255,102,255,.8);
	    display: none;
	}
	.box-controles ul li > div:hover .im-btn-info {
		display: block;
	}
	.im-btn-info:before {
		content: '';
	    position: absolute;
	    top: -10px;
	    right: 15px;
	    width: 0;
	    height: 0;
	    border-left: 5px solid transparent;
	    border-right: 5px solid transparent;
	    border-bottom: 10px solid rgba(255,102,255,1);
	}

</style>
<div id="practice-info" class="small-padding no-padding-top">
	<div class="container">
	@if (!empty($practice))
		<div class="form-box editable-info bg-lblue white-text">
			<div class="box-header">
				<div class="box-title bg-pink">
					<h3>Practice Information</h3>
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
						<li><div class="btn im-btn pink-btn"  practices-id="{{ $practice->id }}" onclick="Practices.Delete(this);return false;">
							<i class="fa fa-trash" aria-hidden="true"></i>
							<div class="im-btn-info">Delete Account</div>
						</div></li>
					</ul>
				</div>
			</div>
			<div class="personal-image">
		        <img src="{{ asset('/img/'.Auth::user()->avatar) }}" alt="">
		    </div>
			<div class="prfile-info">
				<h4>
					<span>{{ $practice->name?:'N/A' }}</span>
				</h4>
				<p><strong>Address: </strong>{{ $practice->address?:'N/A' }}</p>
				<p><strong>Telephone: </strong>{{ $user->phone?:'N/A' }}</p>
				<p><strong>Fax: </strong>{{ $practice->fax?:'N/A' }}</p>
				<p><strong>Email Address: </strong>{{ $practice->email?:'N/A' }}</p>
				<p><strong>Website: </strong>{{ $practice->site?:'N/A' }}</p>
				<p><strong>Practice Manager: </strong>{{ $user->first_name?:'N/A' }} {{ $user->last_name?:'N/A' }}</p>
			</div>
		</div>
	@endif
	</div>
</div>
