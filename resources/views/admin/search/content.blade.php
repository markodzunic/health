<section class="small-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    @if ($results)
                      @foreach ($results as $result)
                        <div class="im-notification">
                            <div class="h2 notification-title">
                                <a href="{{ URL::to('my_knowledge_box_features?section='.$result->section.'&pg_id='.$result->id.'&page_id='.$result->page_id) }}" class="im-blue">{{ $result->title }}</a>

                            </div>
                            <a href="#" class="h4 im-toggle-menu-item"></a>
                            <div class="im-toggle-content">
                            <div class="im-notification-content">
                                <div class="im-lblue h3">
                                    <strong>{{ $result->pg_name }}</strong>
                                </div>
                                <div class="">
                                    <?php
                                      $t = isset(HTMLDomParser::str_get_html($result->description)->find('body p')[0]) ? HTMLDomParser::str_get_html($result->description)->find('body p')[0] : "";
                                      if ($t)
                                        $t = strip_tags($t)
                                    ?>
                                    {{ $result->description ? str_limit($t, 80) : 'N/A' }}
                                </div>
                            </div></div>
                        </div>
                      @endforeach
                    @endif
            </div>
        </div>
    </div>
</section>
