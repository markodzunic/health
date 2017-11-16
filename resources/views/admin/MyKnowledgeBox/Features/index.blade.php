@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style>
	.im-toggle-menu-item {
		border: 1px solid #002060;
		/*background-color: #002060;*/
		/*color: #002060 !important;*/
	}
	.im-toggle-menu-item.im-open {
		background: #002060;
	}
	.im-toggle-menu-item:before, .im-accordion-menu-item:before {
		color: #002060;
	}
	section.im-odd-bg {
		max-width: 33.3333%;
		padding: 15px;
		background: #fff;
	}
	section.im-odd-bg > a:not(.im-open) {
		padding-top: 50px;
		padding-bottom: 50px;
		border:2px solid #00b0f0;
		color: #00b0f0;
	}
	section.im-odd-bg > a:not(.im-open):before {
		color: #00b0f0;
	}
	section.im-odd-bg > a:not(.im-open):hover {
		background: #00b0f0;
		color: #fff;
	}
	section.im-odd-bg > a:not(.im-open):hover:before {
		color: #fff;
	}
	.im-expande ul.accordion .inner.show{
		 left: 55px;
		 top: 170px;
	}
	.im-toggle-menu-item.im-open {
		position: fixed;
	    left: 220px;
	    right: 0;
	    top: 177px;
	    z-index: 1;
	    height: 53px;
	    overflow: hidden;
	    line-height: 24px;
	}
	.im-expande .im-toggle-menu-item.im-open {
		left: 55px !important;
	}
	section.im-odd-bg > .im-toggle-content.im-active {
		position: fixed;
	    left: 220px;
	    right: 0;
	    top: 230px;
	    bottom: 0;
	    z-index: 1;
	    background: #fff;
	    overflow-y: scroll;
	    width: auto;
	}
	.im-expande section.im-odd-bg > .im-toggle-content.im-active {
		left: 70px;
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
	    float: left;
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
	.im-toggle-content  ol li {
		list-style-type: decimal;
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
	.im-toggle-menu-item:before {
		/*display: none !important;*/
		font-size: 20px;
    right: 5px;
    top: 45px;
	}
	ul.accordion {
	        background: #efefef;
	}
	ul.accordion > li {
		border: 0px solid transparent;
	}
	ul.accordion > li > a {
		text-align: center;
	}
	ul.accordion > li > a.toggle > span {
		float: none !important;
	}
	ul.accordion > li > a.toggle:before {
		content: '';
		position: absolute;
		bottom: 0;
		left: 0;
		right: 0;
		height: 4px;
    	z-index: 1;

		background: transparent;
	}
	ul.accordion > li > a.toggle,
	ul.accordion > li > a.toggle.im-active {
		color: #002060 !important;
    	background-color: transparent !important;
	}
	ul.accordion > li > a.toggle.im-active:before {
		background: #002060;

	}
	.im-grey-box {
		padding-top: 20px;
	    padding-bottom: 10px;
	    background: #efefef;
	    margin-left: -15px;
	    margin-right: -15px;
	    padding-left: 15px;
	    padding-right: 15px;
	    margin-bottom: 20px;
	}
	.im-empty-box {
		padding-top: 20px;
	    padding-bottom: 10px;
	    border: 1px solid #222;
	    margin-left: -15px;
	    margin-right: -15px;
	    padding-left: 15px;
	    padding-right: 15px;
	    margin-bottom: 20px;
	}
	.table-bordered td {
		padding: 15px;
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
		});
		$('.accordion a.toggle ').on('click', function() {
			$('.im-toggle-menu-item').removeClass('im-open').removeClass('bg-lblue');
			$('.im-toggle-content').removeClass('im-active');
			$('.im-toggle-content').hide();
		});
	});
</script>
@stop
