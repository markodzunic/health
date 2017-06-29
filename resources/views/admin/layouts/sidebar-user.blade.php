<div id="info-inside">
  <h5 class="white-text">{{ $user->first_name .' '. $user->last_name }}</h5>
  <div id="profile-image">
      <img src="{{ asset('/img/'.$user->avatar) }}" alt="">
  </div>
</div>
