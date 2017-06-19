<!-- Modal -->
<div id="editPracticeInfo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="small-padding no-padding-top">
		<div class="row">
		    <div class="col-md-12">
		        <h4><strong>Update Your Practice Details</strong></h4>
		    </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-box no-borders no-box-shadow">					
					<label for="">
						<span class="im-blue">Practice Name</span><br />
						<input type="text" id="practice-name" name="practice-name">
						@if ($errors->has('practice-name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('practice-name') }}</strong>
                            </span>
                        @endif
					</label>
					
					<label for="">
						<span class="im-blue">Address</span><br />
						<input type="text" id="address" name="address">
						@if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
					</label>
					
					<label for="">
						<span class="im-blue">Telephone</span><br />
						<input type="text" id="telephone" name="telephone">
						@if ($errors->has('telephone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telephone') }}</strong>
                            </span>
                        @endif
					</label>
					
					<label for="">
						<span class="im-blue">Fax</span><br />
						<input type="text" id="fax" name="fax">
						@if ($errors->has('fax'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fax') }}</strong>
                            </span>
                        @endif
					</label>
					
					<label for="">
						<span class="im-blue">Email Address</span><br />
						<input type="email" id="email-address" name="email-address">
						@if ($errors->has('email-address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email-address') }}</strong>
                            </span>
                        @endif
					</label>
					
					<label for="">
						<span class="im-blue">Website</span><br />
						<input type="text" id="website" name="website">
						@if ($errors->has('website'))
                            <span class="help-block">
                                <strong>{{ $errors->first('website') }}</strong>
                            </span>
                        @endif
					</label>
					
					<label for="">
						<span class="im-blue">Practice Manager</span><br />
						<input type="text" id="practice_manager" name="practice_manager">
						@if ($errors->has('practice_manager'))
                            <span class="help-block">
                                <strong>{{ $errors->first('practice_manager') }}</strong>
                            </span>
                        @endif
					</label><br /><br />
					<div align="right">
						<button type="button" class="btn im-btn pink-btn">Save</button>
						<button type="button" class="btn im-btn pink-btn"  data-dismiss="modal">Cancle</button>
					</div>
				</div>
			</div>
		</div>
	</div>
    </div>

  </div>
</div>