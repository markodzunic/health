<section class="small-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                    @if ($notificationsN)
                      @foreach ($notificationsN as $notification)
                        <div class="im-notification {{ $notification->created_at > \Carbon\Carbon::now()->subDays(1) ? 'im-new' : '' }}">
                            <div class="h2 notification-title bg-lblue">
                              @if ($notification->category == 'page')
                                <a href="{{ URL::to('my_knowledge_box_features?section='.$notification->section.'&pg_id='.$notification->id.'&page_id='.$notification->page_id) }}" class="im-white">{{ $notification->title }}</a>
                              @else
                                <a href="{{ URL::to('blogs') }}" class="im-white">{{ $notification->title }}</a>
                              @endif
                            </div>
                            <div class="im-notification-content">
                                <div class="im-lblue">
                                    <strong>{{ $notification->type == 'blog' ? $notification->category : $notification->pg_name. ' - '.$notification->category }}</strong>
                                </div>
                                <div class="not-autor"><i class="fa fa-user"></i> <span>{{ $notification->user_name }}</span></div>
                                <div class="not-date"><i class="fa fa-clock-o"></i> <span>{{ $notification->created_at }}</span></div>
                            </div>
                        </div>
                      @endforeach
                    @endif

                    @if($pagination)
                        <div id="pagination" class="no-print">
                            <div class="sales-query-pagination">
                                {!! $notifications->links() !!}
                                <span class="pagination-total">Total: {{ $notifications->total() }}</span>
                            </div>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</section>
