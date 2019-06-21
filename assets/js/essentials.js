jQuery(function($) {

/* Normalize */
/* ---------------------------------------------------------------------- */

	jQuery('body').css('opacity','1');
	
	// Local Scroll Speed
	$.localScroll({
		duration: 750
	});	

	// Page Preloading
	$(window).load(function() {
		$('.preloader').fadeOut();
	});	
	
	// Focus styles for menus when using keyboard navigation
	// Properly update the ARIA states on focus (keyboard) and mouse over events
	$( '[role="menubar"]' ).on( 'focus.aria  mouseenter.aria', '[aria-haspopup="true"]', function ( ev ) {
		$( ev.currentTarget ).attr( 'aria-expanded', true );
	} );
	// Properly update the ARIA states on blur (keyboard) and mouse out events
	$( '[role="menubar"]' ).on( 'blur.aria  mouseleave.aria', '[aria-haspopup="true"]', function ( ev ) {
		$( ev.currentTarget ).attr( 'aria-expanded', false );
	} );

	$("#main-menu").setupNavigation();

    //$('.menu > ul > li:not(:has(ul ul))').addClass('normal-sub-wrap');
    //$('.menu > ul > li > ul:has(ul)').addClass('megamenu');
    //$('.menu > ul > li.has_megamenu').removeClass('normal-sub-wrap');
    //$('.menu > ul > li.has_megamenu ul').addClass('megamenu custom_megamenu').removeClass('normal-sub');
	//$('.menu > ul > li > ul.megamenu').wrap( '<div class="megamenu-wrapper"></div>' );
    //$('ul.sub-menu.megamenu > li.menu-item-has-children a').wrap( '<span class="megamenu-sub-wrapper"></span>' );

    "use strict";
	//Checks if li has sub (ul) and adds class for toggle icon - just an UI
    $('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');

    $('.menu > ul > li:not(:has(ul ul))').addClass('normal-sub-wrap');
    $('.menu > ul > li > ul:has(ul)').addClass('megamenu');
    $('.menu > ul > li.has_megamenu').removeClass('normal-sub-wrap');
    $('.menu > ul > li.has_megamenu ul').addClass('megamenu custom_megamenu').removeClass('normal-sub');;
    //$('.menu > ul > li > ul.megamenu').wrap( '<div class="megamenu-wrapper"></div>' );
    //$('ul.sub-menu.megamenu > li.menu-item-has-children a').wrap( '<span class="megamenu-sub-wrapper"></span>' );

    
	//Checks if drodown menu's li elements have anothere level (ul), if not the dropdown is shown as regular dropdown, not a mega menu (thanks Luka Kladaric)
    $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
    
    //Adds menu-mobile class (for mobile toggle menu) before the normal menu
    //Mobile menu is hidden if width is more then 959px, but normal menu is displayed
    //Normal menu is hidden if width is below 959px, and jquery adds mobile menu
    //Done this way so it can be used with wordpress without any trouble
    $(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\">Navigation</a>");

	//If width is more than 991px dropdowns are displayed on hover
    $(".normal_menu .menu > ul > li").hover(
        function (e) {
            if ($(window).width() > 991) {
                $(this).children("ul").fadeIn(250);
                e.preventDefault();
            }
        }, function (e) {
            if ($(window).width() > 991) {
                $(this).children("ul").fadeOut(250);
                e.preventDefault();
            }
        }
    );
    $(".normal_menu .menu > ul > li.split-sub").hover(
        function (e) {
            if ($(window).width() > 991) {
                $(this).children("ul").css('display','flex');
                e.preventDefault();
            }
        }, function (e) {
            if ($(window).width() > 991) {
                $(this).children("ul").fadeOut(250);
                e.preventDefault();
            }
        }
    ); 
    
    //the following hides the menu when a click is registered outside
    $(document).on('click', function(e){
        if($(e.target).parents('.menu').length === 0)
            $(".menu > ul").removeClass('show-on-mobile');
    });

    //If width is less or equal to 991px dropdowns are displayed on click (thanks Aman Jain from stackoverflow)
    $(".normal_menu .menu > ul > li").click(function() {
        //no more overlapping menus
        //hides other children menus when a list item with children menus is clicked
        var thisMenu = $(this).children("ul");
        var prevState = thisMenu.css('display');
        $(".normal_menu .menu > ul > li > ul").slideUp();
        if ($(window).width() < 991) {
            if(prevState !== 'block')
                thisMenu.slideDown(250);
        }
    });

    //Full site hamburger menu
    $(".full_site_hamburger .menu > ul > li").click(function() {
        //no more overlapping menus
        //hides other children menus when a list item with children menus is clicked
        var thisMenu = $(this).children("ul");
        var prevState = thisMenu.css('display');
        $(".full_site_hamburger .menu > ul > li > ul").slideUp();
        //if ($(window).width() < 991) {
            if(prevState !== 'block')
                thisMenu.slideDown(250);
        //}
    });

	$('.hamburger-menu').click(function() {
	   $(this).toggleClass('active',250);
	   $('.site_overlay').toggleClass('open',250);
	});


    //when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story (thanks mwl from stackoverflow)
    $(".menu-mobile").click(function (e) {
        $(".menu > ul").toggleClass('show-on-mobile');
        e.preventDefault();
    });


	// Slide In Mobile Menu
    var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

    var hamburgers = document.querySelectorAll("#open-button");
    if (hamburgers.length > 0) {
      forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener("click", function() {
          this.classList.toggle("is-active");
        }, false);
      });
    }
	var $document = $(document),
		$page = $("#main_content"),
		$menu = $("#header-menu-wrapper"),
		$Mobilehamburger = $(".hamburger");
		$hamburgerMenu = $(".hamburger-menu");
		$header = $("#header-container");
	
	$Mobilehamburger.on("click", function (e){
		e.preventDefault();
		$(window).scrollTop(0);
		
		var $this = $(this);
		
		if ($this.hasClass("active")){
			$this.removeClass("active");
			$page.removeClass("show_page_slide").addClass("closed_page_slide");
			$menu.removeClass("menu_open").addClass("menu_close");
			$header.removeClass("header_menu_open").addClass("header_menu_close");
			
		}else{
			$this.addClass("active");
			$page.addClass("show_page_slide").removeClass("closed_page_slide");
			$menu.addClass("menu_open").removeClass("menu_close");
			$header.addClass("header_menu_open").removeClass("header_menu_close");
		};
		$page.on("click", function (){
			$Mobilehamburger.removeClass("active");
			$Mobilehamburger.removeClass("is-active");
			$hamburgerMenu.removeClass("active");
			$page.removeClass("show_page_slide").addClass("closed_page_slide");
			$menu.removeClass("menu_open").addClass("menu_close");
			$header.removeClass("header_menu_open").addClass("header_menu_close");
			$('.site_overlay').removeClass('open',250);
		});		
	});


/* Sticky Footer */
/* ---------------------------------------------------------------------- */
	var didScroll;
	var lastScrollTop = 0;
	var delta = 5;
	var footerHeight = $('#footer_container').outerHeight();
	
	$(window).scroll(function(event){
	    didScroll = true;
	});
	
	setInterval(function() {
	    if (didScroll) {
	        hasScrolled();
	        didScroll = false;
	    }
	}, 250);
		
	function hasScrolled() {
	    var st = $(this).scrollTop();
	    
	    // Make sure they scroll more than delta
	    if(Math.abs(lastScrollTop - st) <= delta)
	        return;
	    
	    // If they scrolled down and are past the navbar, add class .nav-up.
	    // This is necessary so you never see what is "behind" the navbar.
	    if (st > lastScrollTop && st > footerHeight){
	        // Scroll Down
	        $('#footer_container').removeClass('is_hidden').addClass('not-hidden');
	    } else {
	        // Scroll Up
	        if(st + $(window).height() < $(document).height()) {
	            $('#footer_container').removeClass('not-hidden').addClass('is_hidden');
	        }
	    }
	    
	    lastScrollTop = st;
	}
	
	$(window).load(function(){
		get_footer_height();
		
	    //function to get current div_1 height
	    function get_footer_height(){
	        //var footer_height = $('#footer_container').height();
	        var footer_height = $('#footer_container.fixedFooter').outerHeight();
	        //$('footer').css('padding-top', footer_height);
	        $('#main_content').css('padding-bottom', footer_height);
	    }
    });	
    
    
/* Footer - smooth scroll to top */
/* ---------------------------------------------------------------------- */
	var offset = 300,// browser window scroll (in pixels) after which the "back to top" link is shown
		offset_long = 350,
		offset_opacity = 1200,//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		scroll_top_duration = 700,//duration of the top scrolling animation (in ms)
		$back_to_top = $('.cd-top');//grab the "back to top" link
		$header_container = $('#header-container');
	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});
	$(window).scroll(function(){
		( $(this).scrollTop() > offset_long ) ? $header_container.addClass('header-container-slide', 1000) : $header_container.removeClass('header-container-slide header-container-fade-out', 1000);
		if( $(this).scrollTop() > offset_opacity ) { 
			$header_container.addClass('header-container-fade-out');
		}
	});
	// smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		history.pushState( {}, "", this.href );
		$('body,html').animate({ scrollTop: 0 }, 1000);
		$(window.location.hash).attr("tabindex", -1).focus();
	});



});

