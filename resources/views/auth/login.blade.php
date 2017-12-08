@extends('admin.layouts.login-default')

@section('MainContent')
<section>

    <div class="row" id="user-forms">
        <div class="col-md-4 bg-white">
            <div class="vertical-center">
                <div class="image-wrapper im-center">
                    <a href="{{ URL::to('/home') }}">
                        <img src="{{ asset('/img/imdeical-logo-icon-210.png') }}" alt="iMedical">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="vertical-center">
                <h1 class="im-white">iMedical</h1>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif                
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    {{-- <div class="form-group">
                      <div class="controls"> 
                       <input id="remember_Me" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><label for="remember_Me">Remember Me<span></span></label>
                      </div>
                    </div> --}}

                    <div class="form-group user-forms-btn-set">
                        <button type="submit" class="btn im-btn blue-btn">
                            Sign In
                        </button>
                        <a class="btn im-btn white-btn btn-link" href="{{ URL::to('/register') }}">
                            Website Registration
                        </a>
                        <a class="btn im-btn white-btn btn-link" href="{{ route('password.request') }}">
                            Forgotten Password?
                        </a>
                    </div>
                    <p class="im-white">
                        <em>Your use of iMedical is strictly subject to the <a href="{{ URL::to('/terms_conditions_for_services') }}" class="im-white">Terms & Conditions for Services</a>. Please see our <a href="{{ URL::to('/legal') }}" class="im-white">Legal page</a> for details. By logging in to use iMedical, you confirm your agreement to the <a href="{{ URL::to('/terms_conditions_for_services') }}" class="im-white">Terms & Conditions for Services</a>.</em>
                    </p>
                </form>
                
            </div>
        </div>
    </div>

    
    

</section>
@endsection

@section('AditionalFoot')
<script type="text/javascript">
    function resizeAcoridians() {
        if ($(window).width() > 992) {
           var windowHeight = $(window).height();
           $('.vertical-center').each(function() {
            var curentHeight = $(this).height();
            var newPosition = ((windowHeight - curentHeight)/2)-30;

            $(this).css('margin-top', newPosition);
           });
        }
    }
    $(document).ready(function () {
        resizeAcoridians();
    })
    $( window ).resize(function() {
      resizeAcoridians();
    });
</script>
@endsection
