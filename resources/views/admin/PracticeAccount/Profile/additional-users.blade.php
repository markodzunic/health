<div id="add-user" class="small-padding no-padding-top">
	<div class="row">
	    <div class="col-md-12">
	        <h4><strong>Add additional users</strong></h4>
	        <div class="form-box">
	        	<p>Curently available slots for new users <span class="im-lblue">{{ $limit }}</spam>.</p>
	        	<div align="right">
					<button class="btn im-btn pink-btn"  practice-id="{{ $practice->id }}" onclick="Users.Update(this,'');return false;">Add User</button>
				</div><br />
	        	<p>If you wish to request additional users, then please click <a href="#" class="im-pink">here</a></p>
	        </div>
	    </div>
	</div>
</div>
