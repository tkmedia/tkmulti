jQuery(function($) {

	AOS.init({
	  // Global settings:
	  disable: 'mobile', // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
	  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
	  initClassName: 'aos-init', // class applied after initialization
	  animatedClassName: 'aos-animate', // class applied on animation
	  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
	  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
	  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
	  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
	  
	  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
	  offset: 120, // offset (in px) from the original trigger point
	  delay: 0, // values from 0 to 3000, with step 50ms
	  duration: 1000, // values from 0 to 3000, with step 50ms
	  easing: 'ease-in-out', // default easing for AOS animations
	  once: true, // whether animation should happen only once - while scrolling down
	  mirror: false, // whether elements should animate out while scrolling past them
	  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
	
	});

	
	// Auto Padding content top
	$(window).load(function(){
		get_header_height();
	    //function to get current div height
	    function get_header_height(){
	        //var footer_height = $('#footer_container').height();
	        var header_height = $('.absoluteHeader').outerHeight();
	        $('#main_content').css('padding-top', header_height);
	    }
    });	

	// Sticky fixedHeader
	'use strict';
	var c, currentScrollTop = 0,
		mainHeader = $('#header-container.fixedHeader');
		mainHamburger = $('.hamburger');
	
	$(window).scroll(function () {
		var a = $(window).scrollTop();
		var b = mainHeader.height();
	 
		currentScrollTop = a;
	 
		if (c < currentScrollTop && a > b + b) {
			mainHeader.addClass("is_hidden");
			mainHamburger.addClass("is_hidden");
		} else if (c > currentScrollTop && !(a <= b)) {
			mainHeader.removeClass("is_hidden");
			mainHamburger.removeClass("is_hidden");
		}
		c = currentScrollTop;
	});

	// Sticky Nav Only
	$(window).scroll(function(){
		get_header_wrapper_height();
		function get_header_wrapper_height(){
			var header_wrapper_height = $('.header_wrapper').outerHeight();
		    if ($(window).scrollTop() >= header_wrapper_height) {
		        $('.header_menu_container_wrap').addClass('fixed-header');
		    }
		    else {
		        $('.header_menu_container_wrap').removeClass('fixed-header');
		    }
	    }
	});
	    
    
/* Page Element Blocks */
/* ---------------------------------------------------------------------- */	

	//* ## Home Main slider */
	var topSliderCount = $('#top-slider.style2').find('.swiper-slide').length;
	var interleaveOffset = 0.5;
	if(topSliderCount>1){
		var topSlider1 = new Swiper('#top-slider.style2.swiper-container', {
			//direction: 'vertical',
			pagination: {
				el: '#js-pagevertical1',
				clickable: true,
			},
			slidesPerView: 1,
			spaceBetween: 0,
			loop: true,
			watchOverflow: true,
			speed: 1000,
			grabCursor: true,
			watchSlidesProgress: true,
			mousewheelControl: true,
			keyboardControl: true,
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			navigation: {
				nextEl: '#js-next1',
				prevEl: '#js-prev1',
			},
			on: {
				progress: function() {
					var swiper = this;
					for (var i = 0; i < swiper.slides.length; i++) {
						var slideProgress = swiper.slides[i].progress;
						var innerOffset = swiper.width * interleaveOffset;
						var innerTranslate = slideProgress * innerOffset;
						swiper.slides[i].querySelector(".slide-inner").style.transform =
						  "translate3d(" + innerTranslate + "px, 0, 0)";
					}      
				},
				touchStart: function() {
					var swiper = this;
					for (var i = 0; i < swiper.slides.length; i++) {
						swiper.slides[i].style.transition = "";
					}
				},
				setTransition: function(speed) {
					var swiper = this;
					for (var i = 0; i < swiper.slides.length; i++) {
						swiper.slides[i].style.transition = speed + "ms";
						swiper.slides[i].querySelector(".slide-inner").style.transition =
							speed + "ms";
					}
				}
			},
			breakpoints: {
				768: {
					navigation: false,
					pagination: {
						el: '#js-pagevertical1',
						clickable: true,
					},

		        }
			}
		});
		$('#js-pagevertical1').show();
		$('#js-next1').show();
        $('#js-prev1').show();


    }
	// document.querySelector('[data-toggle]').addEventListener('click', function(){
	//   if (swiper.realIndex == 0) {
	//     swiper.slideTo(swiper.slides.length - 1);
	//   } else {
	//     swiper.slideTo(0);
	//   }
	// });
	
	// function logIndex () {
	//   requestAnimationFrame(logIndex);
	//   console.log(swiper.realIndex);
	// }
	// logIndex();

	//* ## Home Main slider - style 2 */
    let options1 = {};
    
    if ( $("#top-slider.style1 > .swiper-slide").length > 1 ) {
        options1 = {
            direction: 'horizontal',
            loop: true,
            autoplayDisableOnInteraction: false,
			pagination: {
				el: '#js-pagevertical1',
				clickable: true,
			},
			navigation: {
				nextEl: '#js-next1',
				prevEl: '#js-prev1',
			},
            paginationClickable: true,
            fadeEffect: {
	            crossFade: true
            },
			loop: true,
			speed: 1000,
			grabCursor: true,
			watchSlidesProgress: true,
			mousewheelControl: true,
			keyboardControl: true,
			effect: 'fade',          
           
            
        }
        $('#js-next1').show();
        $('#js-prev1').show();
        $('#js-pagevertical1').show();
    } else {
        options1 = {
            loop: false,
            autoplay: false,
            watchOverflow: true,
            navigation: false,
        }
    }
    var topSlider2 = new Swiper('#top-slider.style1.swiper-container', options1);			    						
    
    //* ## Home Main slider - style 3 */
	var topSliderCount = $('#top-slider.style3').find('.swiper-slide').length;
	var interleaveOffset = 0.5;
	if(topSliderCount>1){
		var topSlider3 = new Swiper('#top-slider.style3.swiper-container', {
			effect: 'fade',
			pagination: {
				el: '#js-pagevertical1',
				clickable: true,
			},
			slidesPerView: 1,
			spaceBetween: 0,
			loop: true,
			watchOverflow: true,
			speed: 1000,
			grabCursor: true,
			watchSlidesProgress: true,
			mousewheelControl: true,
			keyboardControl: true,
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			navigation: {
				nextEl: '#js-next1',
				prevEl: '#js-prev1',
			},
			breakpoints: {
				768: {
					navigation: false,
					pagination: {
						el: '#js-pagevertical1',
						clickable: true,
					},

		        }
			}
		});
		$('#js-pagevertical1').show();
		//$('#js-next1').show();
        //$('#js-prev1').show();
    }
	
							
	$('.footer-content-wrap.two > .footer-content-col').addClass('col-sm-6');
	$('.footer-content-wrap.three > .footer-content-col').addClass('col-sm-4');
	$('.footer-content-wrap.four > .footer-content-col').addClass('col-sm-3');
	
	// Popup contact form
	$('.form_popup_link').magnificPopup({
		type:'inline',
		midClick: true,
		callbacks: {
			beforeOpen: function() {
			   this.st.mainClass = this.st.el.attr('data-effect');
			}
		},
		removalDelay: 500,
	});	

	$('.grid_gallery1').magnificPopup({
		type: 'image',
		delegate: 'a',
		midClick: true,
		removalDelay: 300,
		mainClass: 'mfp-fade',
		gallery: {
			enabled: true, // set to true to enable gallery
			preload: [0,2], // read about this option in next Lazy-loading section
			navigateByImgClick: true,
			arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button
			tPrev: 'הקודם', // title for left button
			tNext: 'הבא', // title for right button
			tCounter: '<span class="mfp-counter">%curr% מתוך %total%</span>' // markup of counter
		},
		tClose: 'סגור', // Alt text on close button
		tLoading: 'טוען...', // Text that is displayed during loading. Can contain %curr% and %total% keys
		image: {
		tError: '<a href="%url%">התמונה</a> לא ניתנת לתצוגה' // Error message when image could not be loaded
		},
		ajax: {
		tError: '<a href="%url%">התוכן</a> לא ניתן לתצוגה' // Error message when ajax request failed
		}	
	});

	// Init fancybox
	$('[data-fancybox="gallery"]').fancybox({
		//selector : '.gallery_slider .swiper-wrapper a',
		thumbs   : {
			//autoStart : true
		},
		loop: false,
		backFocus : false,
		hash     : false,
		//animationEffect : "fade",
		//beforeClose : function(instance) {
			// This is index of current fancyBox slide
			//console.info( instance.currIndex  );
			// Update position of the slider
			//mySwiper.slideTo( instance.currIndex, 0 );
		//},
		buttons: [
			"zoom",
			"share",
			"slideShow",
			"fullScreen",
			"download",
			"thumbs",
			"close"
		],
		lang: "he",
		i18n: {
		he: {
		  CLOSE: "סגור",
		  NEXT: "הבא",
		  PREV: "הקודם",
		  ERROR: "The requested content cannot be loaded. <br/> Please try again later.",
		  PLAY_START: "התחל מצגת",
		  PLAY_STOP: "השהה מצגת",
		  FULL_SCREEN: "מסך מלא",
		  THUMBS: "תמונות מוקטנות",
		  DOWNLOAD: "הורד",
		  SHARE: "שתפו",
		  ZOOM: "זום"
		}
		}
	});


	// Popup contact form
	$('.form_popup_link').magnificPopup({
		type:'inline',
		midClick: true,
		callbacks: {
			beforeOpen: function() {
			   this.st.mainClass = this.st.el.attr('data-effect');
			}
		},
		removalDelay: 500,
	});

	// init Masonry
	var $grid = $('.grid').masonry({
	  itemSelector: '.grid-item',
	  percentPosition: true,
	  columnWidth: '.grid-sizer'
	});
	// layout Masonry after each image loads
	$grid.imagesLoaded().progress( function() {
	  $grid.masonry();
	}); 

	//* ## add Accordion Accessible
	$('.content_accordion_col > .content_accordion_subcol > .content_accordion_item').attr('tabindex', '0');
	$('.content_accordion_col > .content_accordion_subcol > .content_accordion_item > .accordion_item_text').attr('aria-hidden', 'true');
	$('.content_accordion_col > .content_accordion_subcol > .content_accordion_item > .accordion_item_title').attr('aria-expanded', 'false');
	$('.content_accordion_col > .content_accordion_subcol > .content_accordion_item > .accordion_item_text').attr('aria-expanded', 'false');
	$('.content_accordion_col > .content_accordion_subcol > .content_accordion_item').click(function(){
		if($(this).children('.accordion_item_text').attr('aria-hidden') == 'true') {
			$(this).children('.accordion_item_text').attr('aria-hidden', 'false');
			$(this).children('.basic').attr('aria-expanded', 'true');
			$(this).children('.accordion_item_text').attr('aria-expanded', 'ture');
			$(this).children('.accordion_item_title').addClass('q_open');
		} else {
			$(this).children('.accordion_item_text').attr('aria-hidden', 'true');
			$(this).children('.basic').attr('aria-expanded', 'false');
			$(this).children('.accordion_item_text').attr('aria-expanded', 'false');
			$(this).children('.accordion_item_title').removeClass('q_open');
		}
		//$(this).children('.accordion_item_text').slideToggle();
	});
	$('.content_accordion_col > .content_accordion_subcol > .content_accordion_item').on("keydown", function(ev){ if (ev.which == 13) { $(this).click(); } });
	
	//* ## Page content Accordion  Style 01 
	$('.content_accordion_col > .content_accordion_subcol > .content_accordion_item').attr('tabindex', '0');
	$('.acc-style1 .content_accordion_col > .content_accordion_subcol > .content_accordion_item > .accordion_item_text').attr('aria-hidden', 'true');
	$('.acc-style1 .content_accordion_col > .content_accordion_subcol > .content_accordion_item > .accordion_item_title').attr('aria-expanded', 'false');
	$('.acc-style1 .content_accordion_col > .content_accordion_subcol > .content_accordion_item > .accordion_item_text').attr('aria-expanded', 'false');
	$('.acc-style1 .content_accordion_col > .content_accordion_subcol > .content_accordion_item').click(function(){
		if($(this).children('.accordion_item_text').attr('aria-hidden') == 'true') {
			$(this).children('.accordion_item_text').attr('aria-hidden', 'false');
			$(this).children('.basic').attr('aria-expanded', 'true');
			$(this).children('.accordion_item_text').attr('aria-expanded', 'ture');
			$(this).children('.accordion_item_title').addClass('q_open');
		} else {
			$(this).children('.accordion_item_text').attr('aria-hidden', 'true');
			$(this).children('.basic').attr('aria-expanded', 'false');
			$(this).children('.accordion_item_text').attr('aria-expanded', 'false');
			$(this).children('.accordion_item_title').removeClass('q_open');
		}
		//$(this).children('.accordion_item_text').slideToggle();
	});
	$('.content_accordion_col > .content_accordion_subcol > .content_accordion_item').on("keydown", function(ev){ if (ev.which == 13) { $(this).click(); } });

	
	//* ## Page Accordion Q&A split 2 columns (Option #2)
	/*
	var $li = $('.page_qa_col > .page_qa_item'),
	    half = Math.floor($li.length/2);
	
	$li.filter(function(i){ return i < half; }).wrapAll('<div class="page_qa_subcol col-sx-12 col-sm-6">');
	$li.filter(function(i){ return i >= half; }).wrapAll('<div class="page_qa_subcol col-sx-12 col-sm-6">');
	*/
	
	
	//* ## Vertical Tab */
	$('.fc_VerticalTab').easyResponsiveTabs({
		type: 'vertical', //Types: default, vertical, accordion
		width: 'auto', //auto or any width like 600px
		fit: true, // 100% fit in a container
		closed: '', // accordion or '' Start closed if in accordion view
		tabidentify: 'hor_1', // The tab groups identifier
		active_Hash: false,// activate hash
		inactive_bg: '#f9f9f9',
		activate: function(event) { // Callback function if tab is switched
			var $tab = $(this);
			var $info = $('#nested-tabInfo2');
			var $name = $('span', $info);
			$name.text($tab.text());
			$info.show();
		}
	});

	
	//* ## Product gallery */
	var galleryThumbs = new Swiper('.gallery-thumbs', {
		spaceBetween: 0,
		slidesPerView: 2,
		loop: true,
		freeMode: true,
		loopedSlides: 5, //looped slides should be the same
		watchSlidesVisibility: true,
		watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
		spaceBetween: 0,
		loop:true,
		loopedSlides: 5, //looped slides should be the same
		navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
		},
		thumbs: {
			swiper: galleryThumbs,
		},
    });
    
	// Product jsSocials
    $(".product_share").jsSocials({
        shares: ["email", "whatsapp", "facebook"],
        showLabel: false,
        showCount: "inside",
        shareIn: "popup"
    });

	// Footer jsSocials
    $(".footer_share").jsSocials({
        shares: ["email", "twitter", "pinterest", "whatsapp", "facebook"],
        showLabel: false,
        showCount: "inside",
        shareIn: "popup"
    });

	// Product Slider
    let optionsProduct = {};
    
    if ( $(".split_hero .swiper-slide").length > 1 ) {
        optionsProduct = {
            //direction: 'horizontal',
            loop: true,
            slidesPerView : 1,
            autoplayDisableOnInteraction: false,
			pagination:false,
			navigation: {
				nextEl: '.split_hero #js-next-s',
				prevEl: '.split_hero #js-prev-s',
			},
            paginationClickable: true,
            fadeEffect: {
	            crossFade: true
            },
			speed: 1000,
			grabCursor: true,
			watchSlidesProgress: true,
			mousewheelControl: true,
			keyboardControl: true,
			//effect: 'fade',  
			breakpoints: {
				768: {
					slidesPerView : 1,
		        }
			}
			        
        }
        $('.split_hero #js-next-s').show();
        $('.split_hero #js-prev-s').show();
    } else {
        optionsProduct = {
            loop: false,
            slidesPerView : 1,
            autoplay: false,
            watchOverflow: true,
            navigation: false,
        }
    }
    var topSliderProduct = new Swiper('.top-product-slider', optionsProduct);									

	// Flex page grid - style 3
	var $grid_item_skip = $('.page_link_grid_wrap.grid_style3 .page_link_grid_item:nth-child(3n+1)');
	$grid_items = $(".page_link_grid_wrap.grid_style3 .page_link_grid_item").not('.page_link_grid_wrap.grid_style3 .page_link_grid_item:nth-child(3n+1)');
	$grid_item_skip.addClass('check1');
	$grid_items.addClass('check2');

	// Flex page grid - style 3
	for (var i = 0; i < $grid_items.length; i += 2) {
	  $grid_items.slice(i, i + 2).wrapAll('<div class="grid_item_wrap wrap_' + (i > 0 && i % 2 == 0 && i % 4 != 0 ? 'offsetRow' : '') + '"><div class="grid_item_row row-flex"></div></div>')
	}

	// Flex timeline 
	$(window).load(function(){
		get_timeline_height();
	    function get_timeline_height(){
	        var time_height = $('.timeline_block_row_wrap').outerHeight();
	        $('.timeline_block_item_top').css('height','calc(' + time_height + 'px - 40px)');
	        $('.timeline_block_item_bottom').css('height','calc(' + time_height + 'px - 40px)');
	    }
	});	

new TypeIt('#myElement', {
  //strings: "This will be typed!"
}).go();
	   				
});