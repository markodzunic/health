<header>
{{ csrf_field() }}
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ URL::to('/dashboard') }}">
            <div id="PracticeLogo" class="bg-blue">
                <div class="practice-logo-container">
                    <img src="http://via.placeholder.com/195x80" alt="">
                </div>
            </div>
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->first_name .' '. Auth::user()->last_name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">

                @include('admin.layouts.header-user-menu')

            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">

            @include('admin.layouts.header-main-menu')

        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
</header>
