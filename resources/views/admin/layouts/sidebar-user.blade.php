
  <span class="h5 im-white" style="font-weight: normal;">{{ $user->title .' '. $user->first_name .' '. $user->last_name }}</span>
  <div id="profile-image">
      <img src="{{ asset('/img/'.$user->avatar) }}" alt="" class="no-margin-bottom">
  </div>
