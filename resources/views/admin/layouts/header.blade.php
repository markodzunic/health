<header>
{{ csrf_field() }}
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->

    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li><a href="#" id="im-search-toggle"><i class="fa fa-search"></i></a></li>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown im-scroller">

                @include('admin.layouts.header-message-menu')
                <li class="message-footer">
                    <a href="{{ URL::to('/messages') }}">Read All New Messages</a>
                </li>

            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu alert-dropdown im-scroller" style="min-width: 230px;">

                @include('admin.layouts.header-alert-menu')

                <li class="divider"></li>
                <li>
                    <a href="{{ URL::to('/notification') }}">View All</a>
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
            <b class="caret"></b>
             <span class="user-practice">{{ isset($practice->name) ? $practice->name : '' }}</span>
            </a>
             {{-- {{ Auth::user()->first_name .' '. Auth::user()->last_name }} <b class="caret"></b></a> --}}
            <ul class="dropdown-menu">

                @include('admin.layouts.header-user-menu')

            </ul>
        </li>
    </ul>
     <div class="navbar-header navbar-left">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="{{ URL::to('/home') }}" class="navbar-brand">
            <img src="{{ asset('/img/imdecial-main-logo.png') }}" alt="iMedical" style="max-height:38px;margin-bottom:0">
        </a>
    </div>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav im-animation">
            {{-- <a class="navbar-brand" href="{{ URL::to('/dashboard') }}">
                <img src="{{ isset($practice->avatar) ? asset('/img/'.$practice->avatar) : asset('/img/avatars/avatar.png') }}" alt="" class="no-margin-bottom">
            </a> --}}
            @include('admin.layouts.header-main-menu')
            <a href="#" id="collapse-sidebar"></a>
        </ul>

    </div>
    <!-- /.navbar-collapse -->
</nav>
</header>
{{-- SEARCH FORM --}}
<div id="im-search-form">
    <form action="/searchPages" class="navbar-form">
        <div class="form-group">
          <div class="im-close im-blue"><i class="fa fa-times" aria-hidden="true"></i></div>
          <button type="submit" class="im-btn pink-btn no-margin-bottom im-btn-small"><i class="fa fa-search"></i></button>
          <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Search">
        </div>
    </form>
</div>
