@extends('admin.layouts.login-default')

@section('MainContent')
<div class="form-box single-page-form" style="margin:auto;">
    <div class="row">
        <div class="col-md-12 im-center">
            <div class="login-img small-padding">
                <img src="{{ asset('/img/imdecial-main-logo.png') }}" alt="iMedical">
            </div>
            <h2><strong>Reset Password</strong></h2>
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label im-center">E-Mail Address</label>

            <div class="col-md-12">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group" align="center">
            <div class="col-md-12">
                <button type="submit" class="btn im-btn pink-btn">
                    Send Password Reset Link
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
