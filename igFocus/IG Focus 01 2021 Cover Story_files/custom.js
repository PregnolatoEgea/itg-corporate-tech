/* sticky header e box ricerca */

/*
jQuery(function($) {
    $(window).bind('scroll', function() {
		if ($(window).scrollTop() > 42) {
            $("header").addClass("fixed");
            $(".header-search").addClass("fixed");
        }
        else {
            $("header").removeClass( "fixed" );
            $(".header-search").removeClass( "fixed" );
        }		
    });
});

$('html').on('DOMMouseScroll mousewheel', function (e) {
  if(e.originalEvent.detail > 0 || e.originalEvent.wheelDelta < 0) { //alternative options for wheelData: wheelDeltaX & wheelDeltaY
    //scroll down
    $("header").removeClass("all-menus");
  } else {
    //scroll up
    $("header").addClass("all-menus");
  }

});
*/

/* box ricerca */

jQuery(function($) {
    $( ".search-button" ).click(function() {
        $( "html" ).scrollTop( 0 );
        $( ".header-search" ).addClass( "open" );
        $( ".dark-overlay" ).addClass( "open" );
    });
});

jQuery(function($) {
    $( ".mobile-search-switch" ).click(function() {
        $( "html" ).scrollTop( 0 );
        $( ".header-search" ).addClass( "open" );
        $( ".dark-overlay" ).addClass( "open" );
    });
});

jQuery(function($) {
    $( ".advanced-search-switch" ).click(function() {
        $( "html" ).scrollTop( 0 );
        $( ".search-block" ).addClass( "hide" );
        $( ".quick-links" ).addClass( "hide" );
        $( ".mobile-advanced-search" ).addClass( "hide" );
        $( ".advanced-search" ).addClass( "show" );
    });
});

jQuery(function($) {
    $( ".basic-search-switch" ).click(function() {
        $( "html" ).scrollTop( 0 );
        $( ".search-block" ).removeClass( "hide" );
        $( ".quick-links" ).removeClass( "hide" );
        $( ".mobile-advanced-search" ).removeClass( "hide" );
        $( ".advanced-search" ).removeClass( "show" );
    });
});

jQuery(function($) {
    $( ".close-search" ).click(function() {
        $( "html" ).scrollTop( 0 );
        $( ".header-search" ).removeClass( "open" );
        $( ".dark-overlay" ).removeClass( "open" );
        $( ".search-block" ).removeClass( "hide" );
        $( ".quick-links" ).removeClass( "hide" );
        $( ".mobile-advanced-search" ).removeClass( "hide" );
        $( ".advanced-search" ).removeClass( "show" );
    });
});

function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}

jQuery(function($) {
    if ($( window ).width() < 1281) {
        $(".search-block input.search-text").attr("placeholder", "Cerca");
    }
});

/******************************** menu desktop common ********************************/
jQuery(function($) {
    $( ".megamenu .w-submenu" ).click(function() {	
		//close other menu opened
		if( $(this).hasClass("open") == false ){			
			$($(".menuItalgasSecLev.open")[0]).removeClass("open");
        }	
		$(this).toggleClass("open");				
    });
});

jQuery(function($) {
    $( ".close-megamenu" ).focus(function() {
        $(this).parents("li").removeClass("open");
        $( ".dark-overlay" ).removeClass( "open" );
    });
});

jQuery(function($) {
    $( ".close-megamenu , .dark-overlay , .primary-menu-bg" ).click(function(event) {
	 	event.stopPropagation();
		$(".primary-menu > .main-menu > li").removeClass("open");
		$(".secondary-menu > ul > li").removeClass("open");
		$( ".dark-overlay" ).removeClass( "open" );
		$('body').css('overflow','auto');
		if( $('#mainItalgasMenu').hasClass("dark-overlay") ){	
			$('#mainItalgasMenu').removeClass("dark-overlay");
		}
    });
});

//close any menu second level open menu item when tab change
jQuery(function($) {
    $( ".navbar-right.main-menu > li > a , .secondary-menu.visible-lg-block > ul > li > a" ).click(function(event) {				
		$($(".menuItalgasSecLev.open")[0]).removeClass("open");
		$('body').css('overflow','hidden');
    });
});

/******************************** primary menu ********************************/

jQuery(function($) {
    $( ".primary-menu > .main-menu > li" ).click(function(event) {	
		$(".primary-menu > .main-menu > li").removeClass("open");
		$(".primary-menu").removeClass("pop");
		$( ".dark-overlay" ).removeClass( "open" );		
		$(this).addClass("open");
		$(".primary-menu").addClass("pop");
		$( ".dark-overlay" ).addClass( "open" );			
		if( $(this).find(".menuItalgasSecLev").hasClass("open") ){			
			$('.menuItalgasFirsLvCover').hide();
		}else{
			$('.menuItalgasFirsLvCover').show();
		}	
    });
});

jQuery(function($) {
    $( ".primary-menu > .main-menu > li *" ).focus(function() {
        $(this).parents(".primary-menu > .main-menu > li").addClass("open");
        $(".primary-menu").addClass("pop");
        $( ".dark-overlay" ).addClass( "open" );
    });
});



/********************************* secondary menu *********************************/
jQuery(function($) {
    $( ".secondary-menu > ul:not(.stock) > li" ).click(function() {	
		$('#mainItalgasMenu .navbar-right.main-menu > li').removeClass("open");
		$('#mainItalgasMenu').addClass("dark-overlay");			
		$(".secondary-menu > ul > li").removeClass("open");		
        $(this).addClass("open");
    });
});

jQuery(function($) {
    $( ".secondary-menu > ul > li *" ).focus(function() {
        $(this).parents(".secondary-menu > ul > li").addClass("open");
        $(".secondary-menu").addClass("pop");
        $( ".dark-overlay" ).addClass( "open" );
    });
});

/* mobile menu*/

jQuery(function($) {
    $( ".mobile-menu-switch" ).click(function() {
        $( "html" ).scrollTop( 0 );
        $( ".mobile-menu" ).toggleClass( "open" )
        $( ".dark-overlay" ).toggleClass( "open" )
    });
});

jQuery(function($) {
    $( ".open-sub2" ).click(function() {
        $( "html" ).scrollTop( 0 );
        $(this).next("ul").addClass("open");
        $(this).parents("ul.first-level").addClass("second");
    });
});

jQuery(function($) {
    $( ".open-sub3" ).click(function() {
        $( "html" ).scrollTop( 0 );
        $(this).next("ul").addClass("open");
        $(this).parents("ul.first-level").addClass("third");
    });
});

jQuery(function($) {
    $( ".second-level > li > .back-button" ).click(function() {
        $( "html" ).scrollTop( 0 );
        $( "ul.first-level" ).removeClass( "second" );
        $(this).parents("ul.second-level").delay(500).removeClass( "open" );
    });
});

jQuery(function($) {
    $( ".third-level > li > .back-button" ).click(function() {
        $( "html" ).scrollTop( 0 );
        $( "ul.first-level" ).removeClass( "third" );
        $( "ul.first-level" ).addClass( "second" );
        $(this).parents("ul.third-level").delay(500).removeClass( "open" );
    });
});

/* select personalizzata filtri */

jQuery(function($) {
    $( ".dropdown-switch" ).click(function() {
        $(this).parent( ".my-select" ).toggleClass( "open" );
    });
});

jQuery(function($) {
    $( ".my-select ul li a" ).click(function() {
        var str = $( this ).text();
        $( ".my-select" ).removeClass( "open" );
        $(".my-select input").val( str );
        
    });
});

/* menu footer */

jQuery(function($) {
    $( ".company-menu-pop > button" ).click(function() {
        $(this).parent(".company-menu-pop").toggleClass( "open" );
    });
});

jQuery(function($) {
    $( ".company-menu-pop .back-button" ).click(function() {
        $(this).parents(".company-menu-pop").removeClass( "open" );
    });
});

/* filtri ricerca mobile */

jQuery(function($) {
    $( ".filters-switch" ).click(function() {
        $(this).toggleClass( "open" );
        $( ".header-search-filters" ).toggleClass( "open" );
        $( ".media-filters" ).toggleClass( "open" );
    });
});

/* inline help */

jQuery(function($) {
    $( ".help-switch" ).click(function() {
        $( ".inline-help" ).toggleClass( "open" );
    });
});

/* Close consent */

jQuery(function($) {
    $( ".close-consent" ).click(function() {
        $( ".cookie-law-consent" ).removeClass( "open" );
    });
});

/* conteggio righe moduli */

$( ".fixed-height .cta-button" ).not( ":empty" ).prev( "p" ).addClass( "w-cta" );
$( ".fixed-height .notice-filetype" ).prev( "p" ).addClass( "w-cta" );
$( ".news-block p.tags" ).prev( "p" ).not( ".category" ).addClass( "w-tags" );

/* marquee newsticker */

var durationVar = 12*window.innerWidth;
console.log("durationVar "+durationVar);

$('.marquee').marquee({
    duration: durationVar,
    gap: 30,
    delayBeforeStart: 0,
    direction: 'left',
    duplicated: false
});