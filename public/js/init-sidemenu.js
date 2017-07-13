// (function() {
// function  sideNavigationCreate() {
// 	$.each($('#MainContent .im-content-section'), function() {
// 	    var sectionId = this.id;
// 	    var sectionTitle = this.title;
// 	    $('#nav-RecommendedBestPractice>ul').append("<li class='side-submenu-item'><a href='#" + sectionId + "'><i class='fa fa-chevron-circle-right' aria-hidden='true'></i><span>" + sectionTitle + "</span></a></li>");
// 	});
// }
// function SideNavigationTitleLength () {
// 	$.each($('#im-SideNavigation > ul > li > a > span'), function() {
//     	if ($(this).html().length > 33) {
//     		var text = $(this).text();
// 			text = text.substr(0,33) + '...';
// 			$(this).text(text);
//     	}
// 	});
//     $.each($('#im-SideNavigation > ul > div span'), function() {
//       if ($(this).html().length > 30) {
//         var text = $(this).text();
//       text = text.substr(0,30) + '...';
//       $(this).text(text);
//       }
//   });
// }
// function sideNavigationPosition() {
// 	var sideNavHeight = $('#im-SideNavigation').height();
// 	var sideNavHeightNew = -(sideNavHeight / 2) + 'px';
// 	$('#im-SideNavigation').css('margin-top', sideNavHeightNew);
// }
// function sideNavigationSubmenu() {
//   $('.nav-side-submenu').removeClass('im-show');  
//   if (($('.side-submenu-item').hasClass('active')) && (!$('#im-SideNavigation > ul > li').hasClass('active'))){
//     $('.nav-side-submenu').addClass('im-show');    
//   }  
//   if($('.nav-side-submenu'))
//   sideNavigationPosition();
// }
// function sideNavigationActiveItem() {					
// 	var lastId,
//         topMenu = $("#im-SideNavigation"),
//         topMenuHeight = topMenu.outerHeight()+60,
//         // All list items
//         menuItems = topMenu.find("a"),
//         // Anchors corresponding to menu items
//         scrollItems = menuItems.map(function(){
//           var item = $($(this).attr("href"));
//           if (item.length) { return item; }
//     });
// 	// Get container scroll position
//    var fromTop = $(this).scrollTop()+ topMenuHeight;
   
//    // Get id of current scroll item
//    var cur = scrollItems.map(function(){
//      if ($(this).offset().top < fromTop)
//        return this;
//    });
//    // Get the id of the current element
//    cur = cur[cur.length-1];
//    var id = cur && cur.length ? cur[0].id : "";
   
//    if (lastId !== id) {
//        lastId = id;
//        // Set/remove active class
//        menuItems
//          .parent().removeClass("active")
//          .end().filter("[href='#"+id+"']").parent().addClass("active");
//    }   
// }

// $(document).ready(function(){
// 	sideNavigationCreate();
// 	sideNavigationPosition();
// 	SideNavigationTitleLength();
// 	// SMOOTH SCROLL
// 	$('#im-SideNavigation a').smoothScroll({
// 		offset: -60,
// 		easing: 'swing',
// 		speed: 600
// 	});	
// });	
// $(window).scroll(function(){
// 	sideNavigationActiveItem();
//   sideNavigationSubmenu();
// });
// $(window).resize(function(){
// 	sideNavigationPosition();
// });
// })();
$(document).ready(function() {
  $('.im-accordion-menu-item').click(function(e) {
      e.preventDefault(); 
      
      var item = $(this).parent().parent().parent().find('.im-accordion');

      if (!item.hasClass('im-active')) {
        item.parent().parent().find('.im-accordion').hide('fast');
        item.parent().parent().find('.im-accordion').removeClass('im-active');
        item.parent().parent().find('.im-accordion-menu-item').removeClass('im-open');
        $(this).parent().find('a').removeClass('im-active');
        $(this).parent().find('a').blur(); 

        $(this).addClass('im-open');
        $(this).find('a').addClass('im-active');
        item.addClass('im-active')
        item.toggle('fast');

        $('.im-toggle-content').hide('fast');
        $('.im-toggle-content').removeClass('im-active');
        $('.im-toggle-menu-item').removeClass('bg-lblue im-open');


      } else {
        item.parent().parent().find('.im-accordion').hide('fast');
        item.parent().parent().find('.im-accordion').removeClass('im-active');
        item.parent().parent().find('.im-accordion-menu-item').removeClass('im-open');
        $(this).parent().find('a').removeClass('im-active');
        $(this).parent().find('a').blur(); 

        $('.im-toggle-content').hide('fast');
        $('.im-toggle-content').removeClass('im-active');
        $('.im-toggle-menu-item').removeClass('bg-lblue im-open');
      }
      
  });

  $('.im-toggle-menu-item').click(function(e) {
      e.preventDefault(); 
      var item = $(this).next();

      if (!item.hasClass('im-active')) {
        item.parent().parent().find('.im-toggle-content').hide('fast');
        item.parent().parent().find('.im-toggle-content').removeClass('im-active');
        item.parent().parent().find('.im-toggle-menu-item').removeClass('bg-lblue im-open');

        $(this).addClass('bg-lblue im-open');
        item.addClass('im-active')
        item.toggle('fast');
      } else {
        item.parent().parent().find('.im-toggle-content').hide('fast');
        item.parent().parent().find('.im-toggle-content').removeClass('im-active');
        item.parent().parent().find('.im-toggle-menu-item').removeClass('bg-lblue im-open');
      }
  });
  $('#main-navigation .left-nav .menu-item:nth-child(2)').addClass('im-active');
});