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
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-md-8">
            <div class="vertical-center">
                <h1 class="im-white">iMedical</h1>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group user-forms-btn-set" >
                        <button type="submit" class="btn im-btn blue-btn">
                            Send Password Reset Link
                        </button>
                    </div>
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