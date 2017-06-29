@extends('admin.layouts.login-default')

@section('MainContent')
<div class="form-box" style="margin:auto;">
    <div class="row">
        <div class="col-md-12">
            <h4><strong>Add New User to Your Practice</strong></h4>
        </div>
    </div>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">Title</label>

            <div class="col-md-12">
                {{-- <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus> --}}
                <select id="title" name="title" class="form-control" required autofocus>
                    <option value="dr">Dr</option>
                    <option value="mr">Mr</option>
                    <option value="mrs">Mrs</option>
                </select>

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
            <label for="first_name" class="col-md-4 control-label">First Name</label>

            <div class="col-md-12">
                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
            <label for="last_name" class="col-md-4 control-label">Last Name</label>

            <div class="col-md-12">
                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
            <label for="date_of_birth" class="col-md-4 control-label">Date of Birth</label>

            <div class="col-md-12">
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
        </div>

        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
            <label for="gender" class="col-md-4 control-label">Gender</label>

            <div class="col-md-12">
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
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-12">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

            <div class="col-md-12">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone" class="col-md-4 control-label">Mobile Phone</label>

            <div class="col-md-12">
                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('occupation') ? ' has-error' : '' }}">
            <label for="occupation" class="col-md-4 control-label">Occupation</label>

            <div class="col-md-12">
                <input id="occupation" type="text" class="form-control" name="occupation" value="{{ old('occupation') }}" required autofocus>

                @if ($errors->has('occupation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('occupation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('med_reg_number') ? ' has-error' : '' }}">
            <label for="med_reg_number" class="col-md-4 control-label">Medical Council Registration Number</label>

            <div class="col-md-12">
                <input id="med_reg_number" type="text" class="form-control" name="med_reg_number" value="{{ old('med_reg_number') }}" required autofocus>

                @if ($errors->has('med_reg_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('med_reg_number') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group" align="right">
            <div class="col-md-12">
                <button type="submit" class="btn im-btn pink-btn">Register</button>
            </div>
        </div>
    </form>
</div>
@stop

@section('AditionalFoot')
    <script type="text/javascript">
        $(function() {
            $('#date_of_birth').datetimepicker({ format: 'MM/DD/YYYY' });
        });
    </script>
@stop
