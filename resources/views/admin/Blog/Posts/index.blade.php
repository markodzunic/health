@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
  <link rel="stylesheet" href="{{ URL::asset('/plugins/text-editor/css/froala_editor.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/plugins/text-editor/css/froala_style.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/plugins/text-editor/css/plugins/code_view.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/plugins/text-editor/css/plugins/colors.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/plugins/text-editor/css/plugins/emoticons.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/plugins/text-editor/css/plugins/image_manager.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/plugins/text-editor/css/plugins/image.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/plugins/text-editor/css/plugins/line_breaker.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/plugins/text-editor/css/plugins/table.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/plugins/text-editor/css/plugins/char_counter.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/plugins/text-editor/css/plugins/video.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/plugins/text-editor/css/themes/red.css') }}">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css"> --}}
  <style>
    .ui-dialog {
      width: 1240px;
    }
    .fr-modal,
    .fr-modal-wrapper,
    .fr-popup {
      z-index: 9999999999999 !important;
    }
    #update-blog.ui-dialog {
      max-width: 100% !important;
      top: 120px !important;
      left: 224px !important;
      right: 0 !important;
      /*bottom: 0 !important;*/
      width: auto !important;
    }
    .im-expande #update-blog.ui-dialog  {
      left: 55px !important;
    }
    .acc-title {
      padding: 15px;
      color: #fff;
      background: rgba(0,176,240,1);
    }
    .acc-content {
      padding: 15px;
      border: 1px solid;
    }
    #imageUpload-1,
    #fr-image-upload-layer-1 {
      display: none !important;
    }
  </style>

@stop

@section('MainContent')
	@include('admin.Blog.Posts.title')


  <section>
    <div class="container-fluid">

      <div class="toolbar">
        <a blogs-id="0" onclick="Blogs.Update(this);return false;" class="btn im-btn empty-btn im-border-btn" style="font-size: 15px;">Create</a>
        <input type="hidden" id="orderby" name="orderby" value="{{ $orderby }}">
        <input type="hidden" id="sortby" name="sortby" value="{{ $sortby }}">
      </div>


      <div id="table-section" class="table-section">
        {!! view('admin.Blog.Posts.table', [
            'blogs' => $blogs,
            'blog_data' => $blog_data,
            'columns' => $columns,
            'pagination' => $pagination,
        ]) !!}
      </div>
    </div>
  </section>

@stop

@section('AditionalFoot')
  {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script> --}}
  {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script> --}}
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/froala_editor.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/align.min.js') }}"></script>
  {{-- <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/code_beautifier.min.js') }}"></script> --}}
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/code_view.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/colors.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/draggable.min.js') }}"></script>
  {{-- <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/emoticons.min.js') }}"></script> --}}
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/font_size.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/font_family.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/image.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/image_manager.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/line_breaker.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/link.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/lists.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/paragraph_format.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/paragraph_style.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/table.min.js') }}"></script>
  {{-- <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/video.min.js') }}"></script> --}}
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/url.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/entities.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/char_counter.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/inline_style.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/plugins/text-editor/js/plugins/save.min.js') }}"></script>

	<script src="{{ URL::asset('/js/Admin/blogs.js') }}"></script>
	<script type="text/javascript">
		Blogs.init();
     $(document).ready(function() {
        $( '.inputfile' ).each( function()
        {
          var $input   = $( this ),
            $label   = $input.next( 'label' ),
            labelVal = $label.html();

          $input.on( 'change', function( e )
          {
            var fileName = '';

            if( this.files && this.files.length > 1 )
              fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else if( e.target.value )
              fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
              $label.find( 'span' ).html( fileName );
            else
              $label.html( labelVal );
          });

          // Firefox bug fix
          $input
          .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
          .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
        });
      });
	</script>
@stop
