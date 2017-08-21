<section id="messages" class="im-odd-bg big-padding" align="justify">
    <div class="container">
      @if ($messages)
        @foreach ($messages as $message)
              <a href="#" id="{{ $message->id }}" messages-id="{{ $message->id }}" class="im-toggle-menu-item {{ $message->is_read ? 'read' : 'not-read' }}">
                  <div class="im-message-info">
                      <div class="user-image">
                          <img src="{{ asset('/img/'.$message->avatar) }}" alt="">
                      </div>
                      <span><i class="fa fa-user"></i>{{ $message->first_name }} {{ $message->last_name }}</span> |
                      <span><i class="fa fa-clock-o"></i>{{ $message->created_at }}</span>
                      <div class="h4 no-margin-bottom">{{ $message->subject }}</div>
                  </div>
              </a>
              <div class="im-toggle-content" style="display: none;">

                  <div class="">
                      <div class="im-delete-message im-right"><a messages-id="{{ $message->id }}" onclick="Messages.Delete(this);return false;"><i class="fa fa fa-trash"></i> Delete Message</a></div>
                      <div class="row">
                          <div class="col-md-12">
                              {{ $message->description }}
                          </div>
                      </div>

                  </div>
              </div>
        @endforeach
      @endif
    </div>
</section>
