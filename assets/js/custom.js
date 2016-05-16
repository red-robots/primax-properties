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

	$(function() {
	    if ( document.location.href.indexOf('staff') > -1 ) {
	        $('li.page-item-160 a').addClass("active");
	    }
	});

	// $(function() {
	//      if($("#homepage-flag").length > 0) {
	//      	$('.main-navigation li.homebutton').css("display": "none");
	//      }
	// });

	
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: "fade",
		controlNav: false,
		directionNav: false
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
	
	//For the projects
	$(".project").colorbox({
		inline:true, 
		width:"80%",
		rel:'js-proj-group',
		href:$(this).attr('href')
	});

	// var $group = $('.project').colorbox({
	// 	inline:true, 
	// 	rel:'inline', 
	// 	href: function(){
 //            return $(this).children();
	// 	      }
	// 	  });
 //      $('#open').on('click', function(e){
 //            e.preventDefault();
 //            $group.eq(0).click();
 //      });
	
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
	        duration: 6000,
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
/*
	*
	*	Map
	*
	------------------------------------*/
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

/*
	*
	*	Home Project Hovers
	*
	------------------------------------*/
	$(".info").hover(
	  function () {
	    $(this).siblings('.js-hover').removeClass("view-proj-off");
	    $(this).siblings('.js-hover').addClass("view-proj-on" , 1000);
	  },
	  function () {
	    $(this).siblings('.js-hover').removeClass("view-proj-on");
	    $(this).siblings('.js-hover').addClass("view-proj-off");
	  }
	);

 $('ul.tabs').each(function(){
    // For each set of tabs, we want to keep track of
    // which tab is active and its associated content
    var $active, $content, $links = $(this).find('a');

    // If the location.hash matches one of the links, use that as the active tab.
    // If no match is found, use the first link as the initial active tab.
    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
    $active.addClass('active');

    $content = $($active[0].hash);

    // Hide the remaining content
    $links.not($active).each(function () {
      $(this.hash).hide();
    });

    // Bind the click event handler
    $(this).on('click', 'a', function(e){
      // Make the old tab inactive.
      $active.removeClass('active');
      $content.hide();

      // Update the variables with the new link and content
      $active = $(this);
      $content = $(this.hash);

      // Make the tab active.
      $active.addClass('active');
      $content.show();

      // Prevent the anchor's default click action
      e.preventDefault();
    });
  });

});// END #####################################    END