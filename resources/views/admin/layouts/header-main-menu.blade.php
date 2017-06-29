<li class="active">
    <a href="{{ URL::to('/dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
</li>
<li id="user-info-side">
  {!! view('admin.layouts.sidebar-user', [
      'user' => Auth::user(),
  ]) !!}
</li>
<li>
    <a href="javascript:;" data-toggle="collapse" data-target="#UserAccount"><i class="fa fa-fw fa-user"></i> My Account <i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="UserAccount" class="collapse">
        <li><a href="{{ URL::to('/user_account') }}">Profile</a></li>
        <li><a href="{{ URL::to('/feedback') }}">Feedback</a></li>
        <li><a href="{{ URL::to('/users') }}">Users</a></li>
    </ul>
</li>
<li>
    <a href="javascript:;" data-toggle="collapse" data-target="#PracticeAccount"><i class="fa fa-fw fa-user"></i> Practice Account <i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="PracticeAccount" class="collapse">
        <li><a href="{{ URL::to('/practice_account') }}">Profile</a></li>
        <li><a href="{{ URL::to('/billing') }}">Billing & Payment</a></li>
        <li><a href="{{ URL::to('/practices') }}">Practices</a></li>
    </ul>
</li>
<li>
    <a href="{{ URL::to('/add_subscription') }}"><i class="fa fa-fw fa-envelope"></i> Add Subscription</a>
</li>
<li>
    <a href="{{ URL::to('/my_knowledge_box') }}"><i class="fa fa-fw fa-gear"></i> My Knowledge Box</a>
</li>
<li>
    <a href="{{ URL::to('/admin_blog') }}"><i class="fa fa-fw fa-commenting"></i> Blog</a>
</li>
<li>
    <a href="{{ URL::to('/report_problem') }}"><i class="fa fa-fw fa-exclamation-circle"></i> Report a Problem</a>
</li>
<li class="divider"></li>
<li>
    <a href="{{ route('logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
</li>
<div style="padding: 50px 15px 15px 15px;float: left;" align="center">
    <h3 class="im-pink">iMedical</h3>
    <p class="white-text">© 2017 iMedical / Legal</p>
</div>