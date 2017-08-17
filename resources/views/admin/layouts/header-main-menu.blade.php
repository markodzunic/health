<li class="active">
    <a href="{{ URL::to('/dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
</li>
{{-- <li id="user-info-side">
  {!! view('admin.layouts.sidebar-user', [
      'user' => Auth::user(),
  ]) !!}
</li> --}}
<li class="has-open">
    <a href="javascript:;" data-toggle="collapse" data-target="#UserAccount"><i class="fa fa-fw fa-user"></i> My Account <i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="UserAccount" class="collapse">
        <li><a href="{{ URL::to('/user_account') }}">Profile</a></li>
        <li><a href="{{ URL::to('/feedback') }}">Feedback</a></li>
        <li><a href="{{ URL::to('/users') }}">Users</a></li>
    </ul>
</li>
<li class="has-open">
    <a href="javascript:;" data-toggle="collapse" data-target="#PracticeAccount"><i class="fa fa-fw fa-hospital-o"></i> Practice Account <i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="PracticeAccount" class="collapse">
        <li><a href="{{ URL::to('/practice_account') }}">Practice Profile</a></li>
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
{{-- <li>
    <a href="javascript:;" data-toggle="collapse" data-target="#Pages"><i class="fa fa-fw fa-file-text"></i> Page <i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="Pages" class="collapse">
        <li><a href="{{ URL::to('/admin_pages') }}">Add New</a></li>
        <li><a href="{{ URL::to('/pages') }}">Pages</a></li>
    </ul>
</li>
<li>
    <a href="javascript:;" data-toggle="collapse" data-target="#BlogPosts"><i class="fa fa-fw fa-commenting"></i> Blog <i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="BlogPosts" class="collapse">
        <li><a href="{{ URL::to('/admin_blog') }}">Add New</a></li>
        <li><a href="{{ URL::to('/blogs') }}">Posts</a></li>
    </ul>
</li> --}}
<li>
    <a href="{{ URL::to('/pages') }}"><i class="fa fa-fw fa-file-text"></i> Pages</a>
</li>
<li>
    <a href="{{ URL::to('/blogs') }}"><i class="fa fa-fw fa-commenting"></i> Blog</a>
</li>
<li>
    <a href="{{ URL::to('/report_problem') }}"><i class="fa fa-fw fa-exclamation-circle"></i> Report a Problem</a>
</li>
<li>
    <a href="{{ URL::to('/site_map') }}"><i class="fa fa-fw fa-sitemap"></i> Site Map</a>
</li>
<li class="divider"></li>
<li>
    <a href="#" onclick="App.LogoutDialog(this);return false;"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
</li>
