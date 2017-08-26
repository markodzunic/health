<section class="small-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    @if ($results)
                      @foreach ($results as $result)
                        <div class="im-notification">
                            <div class="h2 notification-title bg-lblue">
                                <a href="#" class="im-white">{{ $result->title }}</a>
                            </div>
                            <div class="im-notification-content">
                                <div class="im-lblue h3">
                                    <strong>{{ $result->pg_name }}</strong>
                                </div>
                                <div class="">
                                    {{ $result->description ? str_limit(strip_tags(HTMLDomParser::str_get_html($result->description)->find('body p')[0]), 80) : 'N/A' }}
                                </div>
                            </div>
                        </div>
                      @endforeach
                    @endif
            </div>
        </div>
    </div>
</section>
