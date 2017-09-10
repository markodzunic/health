@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style>
	.im-toggle-menu-item {
		border: 1px solid rgba(0,176,240,1);
		/*background-color: rgba(0,176,240,1);*/
		/*color: rgba(0,176,240,1) !important;*/
	}
	.im-toggle-menu-item:before, .im-accordion-menu-item:before {
		color: rgba(0,176,240,1);
	}
	section.im-odd-bg {
		max-width: 33.3333%;
		padding: 5px;
		background: #fff;
	}
	.im-expande ul.accordion .inner{
		 left: 55px;
	}
	section.im-odd-bg > .im-toggle-menu-item.im-open {
		position: fixed;
	    left: 55px;
	    right: 0;
	    top: 177px;
	    z-index: 1;
	    height: 53px;
	    overflow: hidden;
	}
	.im-fixed section.im-odd-bg > .im-toggle-menu-item.im-open {
		left: 220px;
	}
	section.im-odd-bg > .im-toggle-content.im-active {
		position: fixed;
	    left: 70px;
	    right: 15px;
	    top: 230px;
	    bottom: 0;
	    z-index: 1;
	    background: #fff;
	    overflow-y: scroll;
	}
	section.im-odd-bg >.im-toggle-menu-item.im-open:before,
	section.im-odd-bg >.im-accordion-menu-item.im-open:before {
		position: relative;
		font-weight: normal;
	    border: 1px solid #fff;
	    top: 0;
	    left: 0;
	    width: 35px;
	    height: 35px;
	    float: right;
	    text-align: center;
	    line-height: 1;
	    padding: 0;
	    margin-top: -5px;
	    margin-right: 40px;
	}
	ul.accordion .inner {
		background: #fff;
   		z-index: 1;
	}
	.im-toggle-content  ol {
	    display: block;
	    list-style-type: decimal;
	    -webkit-margin-before: 1em;
	    -webkit-margin-after: 1em;
	    -webkit-margin-start: 0px;
	    -webkit-margin-end: 0px;
	    -webkit-padding-start: 40px;
	}
	.im-toggle-content  ul {
	    display: block;
	    list-style-type: disc;
	    -webkit-margin-before: 1em;
	    -webkit-margin-after: 1em;
	    -webkit-margin-start: 0px;
	    -webkit-margin-end: 0px;
	    -webkit-padding-start: 40px;
	}
	.im-toggle-content ul li {
	    display: list-item;
	    text-align: -webkit-match-parent;
	    list-style: inherit;
	}
	.acc-inner  {		
		margin-bottom: 20px;
	}
	.acc-inner .acc-title {
		cursor: pointer;
		font-weight: bold;
    	font-size: 20px;
    	position: relative;
    	line-height: 20px;
	}
	.acc-inner .acc-title:before {
		content: '+';
	    position: absolute;
	    right: 15px;
	    top: 10px;
	    bottom: 10px;
	    margin: auto;
	    color: #fff;
	    font-size: 30px;
	    line-height: 1;
	    color: #000;
	    font-weight: normal;
	    color: #fff;
	}
	.acc-inner.active .acc-title:before {
		content: '-';
	}
	.acc-inner .acc-content {
		display: none;
		border: 0 !important;
		border-bottom: 2px solid #f9f9f9 !important;
	}
	.acc-inner.active .acc-content {
		display: block;
	}
</style>
@stop

@section('MainContent')
@include('admin.MyKnowledgeBox.Features.title')
{{-- @include('admin.MyKnowledgeBox.Features.menu') --}}
@include('admin.MyKnowledgeBox.Features.content')

@stop




@section('AditionalFoot')
<script src="{{ URL::asset('/js/init-sidemenu.js') }}"></script>
<script type="text/javascript">
	$('.toggle').click(function(e) {
	  	e.preventDefault();

	    var $this = $(this);

	    if (!$this.next().hasClass('show')) {
	        $this.parent().parent().find('li .inner').removeClass('show');
	        $this.parent().parent().find('a.toggle').removeClass('im-active');
	        $this.parent().parent().find('li .inner').hide();
	        $this.next().toggleClass('show');
	        $this.toggleClass('im-active');
	        $this.next().toggle();
	    }
	});

	var pg_id = $('#pg_id').val();
	var section = $('#section').val();

	if (section)
		$('#'+section).click();

	// if (pg_id) {
	// 	$('#wrapper').addClass('im-expande');
	// 	resizeAcoridians();
	// }

	function resizeAcoridians() {
		var heightWindow = $(window).height();
		var headerHeight = $('.navbar-header ').height();
		var contentHeight = heightWindow - headerHeight - 50;
		var boxHeight = (contentHeight/6)-5;

		$('ul.accordion > li, ul.accordion > li > a.toggle').css('height', boxHeight);

		var textHeight = $('ul.accordion > li > a.toggle > span').height();
		var textPosition = (boxHeight - textHeight)/2;
		var iconPosition = (boxHeight - 25)/2;

		$('ul.accordion > li > a.toggle > span').css('margin-top', textPosition);
		$('ul.accordion > li > a.toggle > i').css('margin-top', iconPosition);



	}

	$(document).ready(function () {
		// $('#wrapper').addClass('im-expande');
		// resizeAcoridians();
	});
	$(document).ready(function () {
		$('.acc-inner .acc-title').on('click', function() {
			$(this).parent().toggleClass('active');
		})
	});
</script>
@stop
