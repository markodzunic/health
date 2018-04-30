@extends('admin.layouts.login-default')

@section('MainContent')
<section>
    <div class="row reg-form" id="user-forms">
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
                <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="control-label">Title</label>
                        {{-- <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus> --}}
                        <select id="title" name="title" class="form-control" required autofocus>
                            <option value="dr">Dr</option>
                            <option value="mr">Mr</option>
                            <option value="ms">Ms</option>
                            <option value="mrs">Mrs</option>
                        </select>

                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label for="first_name" class="control-label">First Name</label>
                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label for="last_name" class="control-label">Last Name</label>
                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                        <label for="date_of_birth" class="control-label">Date of Birth</label>
                        <div class='input-group date' id='date_of_birth'>
                            <input type='text' name="date_of_birth" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>

                        @if ($errors->has('date_of_birth'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_of_birth') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label for="gender" class="control-label">Gender</label>
                        <select id="gender" name="gender" class="form-control" required autofocus>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>

                        @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-Mail Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="control-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="control-label">Mobile Phone</label>
                        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('occupation') ? ' has-error' : '' }}">
                        <label for="occupation" class="control-label">Occupation</label>
                        <input id="occupation" type="text" class="form-control" name="occupation" value="{{ old('occupation') }}" required autofocus>

                        @if ($errors->has('occupation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('occupation') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- <div class="form-group{{ $errors->has('med_reg_number') ? ' has-error' : '' }}">
                        <label for="med_reg_number" class="control-label">Medical Council Registration Number</label>
                        <input id="med_reg_number" type="text" class="form-control" name="med_reg_number" value="{{ old('med_reg_number') }}" required autofocus>

                        @if ($errors->has('med_reg_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('med_reg_number') }}</strong>
                            </span>
                        @endif
                    </div> -->

                    <div style="width: 100%;float: left;"></div>

                    <div class="form-group" align="left">
                        <button type="submit" class="btn im-btn blue-btn">Register</button>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <p class="im-white">
                                <em>Your registration with and subsequent use of iMedical is strictly subject to the <a href="{{ URL::to('/terms_conditions_for_services') }}" class="im-white">Terms & Conditions for Services</a>. Please see our <a href="{{ URL::to('/legal') }}" class="im-white">Legal page</a> for details. By registering with iMedical, you confirm your agreement to the <a href="{{ URL::to('/terms_conditions_for_services') }}" class="im-white">Terms & Conditions for Services</a>.</em>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop

@section('AditionalFoot')
    <script type="text/javascript">
        $(function() {
            $('#date_of_birth').datetimepicker({ format: 'MM/DD/YYYY' });
        });
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
@stop
