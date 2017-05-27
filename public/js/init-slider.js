(function() {
var revapi4,
	tpj=jQuery;
			
tpj(document).ready(function() {
	if(tpj("#rev_slider_4_1").revolution == undefined){
		revslider_showDoubleJqueryError("#rev_slider_4_1");
	}else{
		revapi4 = tpj("#rev_slider_4_1").show().revolution({
			sliderType:"hero",
			jsFileLocation:"../plugins/slider/",
			sliderLayout:"fullscreen",
			dottedOverlay:"none",
			delay:9000,
						particles: {startSlide: "first", endSlide: "last", zIndex: "1",
							particles: {
								number: {value: 250}, color: {value: "#000000"},
								shape: {
									type: "circle", stroke: {width: 0, color: "#ffffff", opacity: 1},
									image: {src: ""}
								},
								opacity: {value: 0.1, random: false, min: 0.25, anim: {enable: false, speed: 1, opacity_min: 0, sync: true}},
								size: {value: 1, random: true, min: 0.5, anim: {enable: false, speed: 40, size_min: 1, sync: true}},
								line_linked: {enable: true, distance: 70, color: "#000000", opacity: 0.4, width: 1},
								move: {enable: true, speed: 1, direction: "none", random: true, min_speed: 3, straight: false, out_mode: "bounce"}},
							interactivity: {
								events: {onhover: {enable: true, mode: "repulse"}, onclick: {enable: true, mode: "repulse"}},
								modes: {grab: {distance: 400, line_linked: {opacity: 0.5}}, bubble: {distance: 400, size: 100, opacity: 1}, repulse: {distance: 75}}
							}
						},
			responsiveLevels:[1240,1024,778,480],
			visibilityLevels:[1240,1024,778,480],
			gridwidth:[1240,1024,778,480],
			gridheight:[868,768,960,720],
			lazyType:"none",
			parallax: {
				type:"scroll",
				origo:"slidercenter",
				speed:400,
				speedbg:0,
				speedls:0,
				levels:[5,10,15,20,25,30,35,40,45,46,47,48,49,50,0,55],
			},
			shadow:0,
			spinner:"spinner0",
			autoHeight:"off",
			fullScreenAutoWidth:"off",
			fullScreenAlignForce:"off",
			fullScreenOffsetContainer: "",
			fullScreenOffset: "60px",
			disableProgressBar:"on",
			hideThumbsOnMobile:"off",
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			debugMode:false,
			fallbacks: {
				simplifyAll:"off",
				disableFocusListener:false,
			}
		});
	}
	
                RsParticlesAddOn(revapi4);

});	/*ready*/
})();