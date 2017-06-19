@extends('admin.layouts.login-default')

@section('MainContent')
<div class="form-box" style="margin:auto;">
    <div class="row">
        <div class="col-md-12">
            <h4><strong>Login</strong></h4>
        </div>
    </div>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-12">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-12">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 col-md-offset-4">

                <div class="control-group">
                  <div class="controls"> 
                   <input id="remember_Me" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><label for="remember_Me">Remember Me<span></span></label>
                  </div>
                </div>
                
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12" align="center">
                <button type="submit" class="btn im-btn pink-btn">
                    Login
                </button>
                <br />
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
