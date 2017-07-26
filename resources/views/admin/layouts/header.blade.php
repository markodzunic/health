<header>
{{ csrf_field() }}
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <span>{{ isset($practice->name) ? $practice->name : '' }}</span>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="{{ URL::to('/home') }}" class="navbar-brand">
            <img src="{{ asset('/img/imdecial-main-logo.png') }}" alt="iMedical" style="max-height:24px;margin-bottom:0">
        </a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown">

                @include('admin.layouts.header-message-menu')
                <li class="message-footer">
                    <a href="javascript:;">Read All New Messages</a>
                </li>

            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu alert-dropdown">

                @include('admin.layouts.header-alert-menu')

                <li class="divider"></li>
                <li>
                    <a href="javascript:;">View All</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            {{-- <span><img src="{{ asset('/img/'.$user->avatar) }}" alt="" style="max-height: 40px;margin-top: -17px;margin-bottom: -15px;"></span> --}}
            <span id="user-info-side">
              {!! view('admin.layouts.sidebar-user', [
                  'user' => Auth::user(),
              ]) !!}
            </span>
             {{-- {{ Auth::user()->first_name .' '. Auth::user()->last_name }} <b class="caret"></b></a> --}}
            <ul class="dropdown-menu">

                @include('admin.layouts.header-user-menu')

            </ul>
        </li>
    </ul>
    <form class="navbar-form navbar-right">
        <div class="form-group">
          <button type="submit" class="im-btn pink-btn no-margin-bottom im-btn-small"><i class="fa fa-search"></i></button>
          <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav im-animation">
            {{-- <a class="navbar-brand" href="{{ URL::to('/dashboard') }}">
                <img src="{{ isset($practice->avatar) ? asset('/img/'.$practice->avatar) : asset('/img/avatars/avatar.png') }}" alt="" class="no-margin-bottom">
            </a> --}}
            @include('admin.layouts.header-main-menu')
            <a href="#" id="collapse-sidebar" class="bg-lblue"></a>
        </ul>

    </div>
    <!-- /.navbar-collapse -->
</nav>
</header>
