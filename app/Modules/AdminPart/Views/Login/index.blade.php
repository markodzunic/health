@extends('AdminPart::layouts.default-admin-template')
@section('AditionalHead')

@stop

@section('MainContent')
	<div id="form-brochure" class="small-padding">
	{{-- <form method="post"> --}}
		<?php
			$encrypter = app('Illuminate\Encryption\Encrypter');
		    $encrypted_token = $encrypter->encrypt(csrf_token());
		?>
		<input id="token" type="hidden" value="{{$encrypted_token}}">

		<div class="row">
			<div class="col-md-12">
				<p><strong>Fields marked with an asterisk are required</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<label>						
					<input type="text" id="username" name="username" placeholder="User Name">
				</label>
			</div>
			<div class="col-sm-6 col-xs-12">
				<label>						
					<input type="password" id="password" name="password" placeholder="Password">
				</label>
			</div>
			
			<div class="col-xs-12">
				<div class="control-group">
	              <div class="controls"> 
	                <input id="remember" type="checkbox" name="checkbox" value="1" ><label for="UrgentForm">Remember Me<span></span></label>
	              </div>
	            </div>
			</div>						
			<div class="col-xs-12">
				<div style="height: 30px"></div>
				<button href="#" onclick="Login.LoginSubmit(this);return false;" class="btn im-btn pink-btn">Login</button>
			</div>
		</div>
	{{-- </form> --}}
	</div>

	<script src="{{ URL::asset('/js/login/index.js') }}"></script>
@stop



	
@section('AditionalFoot')
	
@stop


