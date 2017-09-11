<li>
    <a href="{{ URL::to('/user_account') }}"><i class="fa fa-fw fa-user"></i> Profile</a>
</li>
@if ($role !== 'newuser')
  <li>
      <a href="{{ URL::to('/messages') }}"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
  </li>
{{--   <li>
      <a href="javascript:;"><i class="fa fa-fw fa-gear"></i> Settings</a>
  </li> --}}
@endif
<li class="divider"></li>
<li>
    <a href="#" onclick="App.LogoutDialog(this);return false;"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
</li>
