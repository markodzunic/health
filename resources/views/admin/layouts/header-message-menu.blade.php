@if ($messages)
  @foreach ($messages as $message)
    <li class="message-preview">
        <a href="javascript:;">
            <div class="media">
                <span class="pull-left">
                    <img class="media-object" src="{{ asset('/img/'.$message->avatar) }}" alt="">
                </span>
                <div class="media-body">
                    <h5 class="media-heading"><strong>{{ $message->first_name }} {{ $message->last_name }}</strong>
                    </h5>
                    <p class="small text-muted"><i class="fa fa-clock-o"></i> {{ $message->created_at }}</p>
                    <p>{{ str_limit($message->description, 30) }}</p>
                </div>
            </div>
        </a>
    </li>
  @endforeach
@else
  <li class="message-preview">
      <a>
          <div class="media">
              <div class="media-body">
                  <p>No messages</p>
              </div>
          </div>
      </a>
  </li>
@endif
