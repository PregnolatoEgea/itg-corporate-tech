function bootstrap_equalizer() {
  $(".equalizer").each(function() {
  	var childs = $(this).find(".watch");
    var heights = $(this).find(".watch").map(function() {
      return $(this).height();
    }).get(),

    maxHeight = Math.max.apply(null, heights);

    //$(".watch").height(maxHeight);
	childs.each(function() {
		$(this).height(maxHeight);
	});
	//$(this).height(maxHeight);
  });
}

if (window.innerWidth > 1024) {
	$( document ).ready(function() {
		setTimeout(function() {
			bootstrap_equalizer();
		},1000)
	});	
}

/** fix header iOS **/
/*
$( document ).ready(function() {
	var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
	if (iOS) {
		var bodyHeight = $("body").height();
		var mobileMenu = $("nav.mobile-menu");
		mobileMenu.height(bodyHeight + "px");
		mobileMenu.css("pointer-events","none");
		mobileMenu.children("*").css("pointer-events","all");
	}
});
*/

