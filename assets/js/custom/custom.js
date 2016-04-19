/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Current Page Active
	*
	------------------------------------*/
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: "slide",
	}); // end register flexslider
	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
	
	/*
	*
	*	Isotope with Images Loaded
	*
	------------------------------------*/
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options
	 itemSelector: '.item',
		  masonry: {
			gutter: 15
			}
 		 });
	});

	/*
	*
	*	Smooth Scroll to Anchor
	*
	------------------------------------*/
	 $('a').click(function(){
	    $('html, body').animate({
	        scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
	    }, 500);
	    return false;
	});

	/*
	*
	*	Nice Page Scroll
	*
	------------------------------------*/
	$(function(){	
		$("html").niceScroll();
	});
	
	
	/*
	*
	*	Equal Heights Divs
	*
	------------------------------------*/
	$('.js-blocks').matchHeight();

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();


	/*
	*
	*	Map
	*
	------------------------------------*/
	$('.count').each(function () {
	    $(this).prop('Counter',0).animate({
	        Counter: $(this).text()
	    }, {
	        duration: 2000,
	        easing: 'swing',
	        step: function (now) {
	            $(this).text(Math.ceil(now));
	        }
	    });
	});

	// $('.stateinfo').on('click', function(e) {
 //      $(this).children('.displaynone').toggleClass("displaynone open"); 
 //      e.preventDefault();
 //    });

    $(".stateinfo").hover(
	  function () {
	    $(this).children('#js-target').removeClass("displaynone");
	    $(this).children('#js-target').addClass("open" , 1000);
	  },
	  function () {
	    $(this).children('#js-target').removeClass("open");
	    $(this).children('#js-target').addClass("displaynone");
	  }
	);

 //    $(".stateinfo").hover(
	//   function () {
	//     $(this).children('.displaynone').addClass("open");
	//   },
	//   function () {
	//     $(this).children('.displaynone').removeClass("displaynone");
	//   }
	// );
	// jQuery('#vmap').vectorMap({
	// 	map: 'usa_en',
	// 	enableZoom: true,
	// 	showTooltip: true,
	// 	selectedColor: null,
	// 	hoverColor: null,
	// 	pins: { "al" : "pin_for_al" },
	// 	pinMode: 'id',
	// 	//selectedRegions: ['OH'],
	// 	colors: {
	// 	mo: '#C9DFAF',
	// 	fl: '#C9DFAF',
	// 	or: '#C9DFAF'
	// 	},
	// 	onRegionClick: function(element, code, region)
 //            {
 //                var message = 'You clicked "'
 //                    + region
 //                    + '" which has the code: '
 //                    + code.toString().toUpperCase();

 //                alert(message);
 //            }


 //    });

});// END #####################################    END