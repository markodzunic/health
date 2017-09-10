<li class="active">
    <a href="{{ URL::to('/dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
</li>
<li id="user-info-side">
  {!! view('admin.layouts.profile-image', [
      'user' => Auth::user(),
  ]) !!}
</li>

  <li class="has-open">
      <a href="javascript:;" data-toggle="collapse" data-target="#UserAccount"><i class="fa fa-fw fa-user"></i> My Account <i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="UserAccount" class="collapse">
            <li><a href="{{ URL::to('/user_account') }}">Profile</a></li>
            <li><a href="{{ URL::to('/feedback') }}">Feedback</a></li>
            @if ($role == 'admin' )
              <li><a href="{{ URL::to('/users') }}">Users</a></li>
            @endif
      </ul>
  </li>

@if ($role !== 'newuser')
  <li class="has-open">
      <a href="javascript:;" data-toggle="collapse" data-target="#PracticeAccount"><i class="fa fa-fw fa-hospital-o"></i> Practice Account <i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="PracticeAccount" class="collapse">
          <li><a href="{{ URL::to('/practice_account') }}">Practice Profile</a></li>
          @if ($role == 'admin' || $role == 'practice_manager')
          <li><a href="{{ URL::to('/billing') }}">Billing & Payment</a></li>
          @endif
          @if ($role == 'admin')
          <li><a href="{{ URL::to('/practices') }}">Practices</a></li>
          @endif
      </ul>
  </li>
@endif

@if ($role == 'practice_manager' || ($role == 'newuser' && $status['approved']))
<li>
    <a href="{{ URL::to('/add_subscription') }}"><i class="fa fa-fw fa-envelope"></i> Add Subscription</a>
</li>
@endif
@if ($role !== 'newuser')
  <li>
      <a href="{{ URL::to('/my_knowledge_box') }}"><i class="fa fa-fw fa-gear"></i> My Knowledge Box</a>
  </li>
@endif

<!-- @if ($status) -->
  <!-- <li>
      <a href="javascript:;" data-toggle="collapse" data-target="#Pages"><i class="fa fa-fw fa-file-text"></i> Page <i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="Pages" class="collapse"> -->
          <!-- <li><a href="{{ URL::to('/admin_pages') }}">Add New</a></li> -->
          <!-- <li><a href="{{ URL::to('/pages') }}">Pages</a></li>
      </ul>
  </li> -->
<!-- @endif -->

<!-- @if ($status) -->
  <!-- <li>
      <a href="javascript:;" data-toggle="collapse" data-target="#BlogPosts"><i class="fa fa-fw fa-commenting"></i> Blog <i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="BlogPosts" class="collapse"> -->
          <!-- <li><a href="{{ URL::to('/admin_blog') }}">Add New</a></li> -->
          <!-- <li><a href="{{ URL::to('/blogs') }}">Posts</a></li>
      </ul>
  </li> -->
<!-- @endif -->

@if ($role == 'admin')
  <li class="has-open">
      <a href="javascript:;" data-toggle="collapse" data-target="#Media"><i class="fa fa-fw fa-image"></i> Media <i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="Media" class="collapse">
          <li><a href="{{ URL::to('/images') }}">Images</a></li>
          <li><a href="{{ URL::to('/documents') }}">Documents</a></li>
      </ul>
  </li>
@endif

@if ($role == 'practice_manager' || $role == 'admin')
  <li>
      <a href="{{ URL::to('/pages') }}"><i class="fa fa-fw fa-file-text"></i> Content Editor</a>
  </li>
@endif

@if ($role == 'admin')
  <li>
      <a href="{{ URL::to('/blogs') }}"><i class="fa fa-fw fa-commenting"></i> Blog</a>
  </li>
@endif

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
