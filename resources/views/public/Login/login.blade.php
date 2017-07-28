<div id="login" title="Sign in">
    {{-- <div class="login-img im-center small-padding">
        <img src="{{ asset('/img/imdecial-main-logo.png') }}" alt="iMedical">
    </div> --}}
    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-12 control-label im-left">Email</label>

            <div class="col-md-12">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-12 control-label im-left">Password</label>

            <div class="col-md-12">
                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        {{-- <div class="form-group">
            <div class="col-md-12 im-center">

                <div class="control-group">
                  <div class="controls">
                   <input id="remember_Me" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><label for="remember_Me">Remember Me<span></span></label>
                  </div>
                </div>

            </div>
        </div> --}}

        {{-- <div class="form-group">
            <div class="col-md-12">
                <a class="im-pink" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            </div>
        </div> --}}
    </form>
</div>
