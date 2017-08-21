    @if ($notifications)
      @foreach ($notifications as $notification)
      	<li class="menu-notification">
      		<a href="#" class="im-white">
	       		<div class="im-notification">
					<div class="notification-title">
						<strong>{{ $notification->title }}</strong>
					</div>
					<div class="im-notification-content">
						<div class="im-lblue">
							{{ $notification->type == 'blog' ? $notification->category : $notification->pg_name. ' - '.$notification->category }}
						</div>
						<div class="not-date"><i class="fa fa-clock-o"></i> {{ $notification->created_at }}</div>
					</div>
				</div>
			</a>
		</li>
      @endforeach
	@else
	  <li class="menu-notification">
	      <a>
	          <div class="im-notification-content">
	                <p>No notifications</p>
	          </div>
	      </a>
	  </li>
	@endif
