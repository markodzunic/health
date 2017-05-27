(function() {
var pageWrap = document.getElementById( 'home' ),
  pages = [].slice.call( pageWrap.querySelectorAll( 'div.svg-container' ) ),
  currentPage = 1,
  loader = new SVGLoader( document.getElementById( 'loader' ), { speedIn : 0 } );
  loader.show();

function init() {
    
      // after some time hide loader
      setTimeout( function() {
        loader.hide();
        // update..
        currentPage = currentPage ? 0 : 1;
        classie.addClass( pages[ currentPage ], 'show' );
        setTimeout( function() {
        	$('#loader').remove();
    	}, 1000);

    	// ---------- Wow Animation ---------- //
        var wow = new WOW({
            boxClass: 'animate',
            animateClass: 'animated',
            offset: 100,
            mobile: true
        });
        wow.init();
        // ---------- Wow Animation ---------- //
        

      }, 2000);
}
$(document).ready(function() {
	init();  
});
})();
