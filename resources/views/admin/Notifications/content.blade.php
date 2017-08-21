<section class="small-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    @if ($notifications)
                      @foreach ($notifications as $notification)
                        <div class="im-notification im-new">
                            <div class="h2 notification-title bg-lblue">
                                <a href="#" class="im-white">{{ $notification->title }}</a>
                            </div>
                            <div class="im-notification-content">
                                <div class="im-lblue h3">
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