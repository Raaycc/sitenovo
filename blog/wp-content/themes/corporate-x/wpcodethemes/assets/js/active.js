/*==================================
====================================
[End Activation Code]
====================================*/ 
(function($) {
    "use strict";
     $(document).on('ready', function() {
		/*====================================
			Custom JS
		======================================*/ 	
		function custom_js() {
			var windowS = $(window),
				windowH = windowS.height(),
				projecthoverS = $('.project-hover'),
				projecthoverH = projecthoverS.height(),
				proejectdevide = (projecthoverH / 2);
				projecthoverS.css({
				marginTop: -proejectdevide,
				});
		}; 
		
		/*====================================
			Mobile Menu
		======================================*/ 	
		$('.menu').slicknav({
			prependTo:".mobile-menu",
		});
	
		/*====================================
			Search Jquery
		======================================*/ 	
		$('.search a').on( "click", function(){
				$('.search-form').toggleClass('s-active');
			});
		$('.search-form i').on( "click", function(){
				$('.search-form').toggleClass('active');
		});  	

		/*====================================
			Sidebar Menu
		======================================*/ 
		$('.fa-bars').on( "click", function(){
				$('.side-menu').toggleClass('active');
			});
		$('.side-menu .remove').on( "click", function(){
				$('.side-menu').toggleClass('active');
		});  
		
		
		/*====================================
			Main Slider
		======================================*/ 
		if ($.fn.slick) {
			$(".slider-main").slick({
				autoplay: true,
				autoplaySpeed: 5000,
				slidesToShow: 1,
				pauseOnHover: true,
				dots: false,
				cssEase: 'linear',
				fade: true,
				draggable: true,
				prevArrow: '<button class="PrevArrow fa fa-angle-left"></button>',
				nextArrow: '<button class="NextArrow fa fa-angle-right"></button>',
				responsive: [{
                    breakpoint: 340,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
						arrows: false,
                    }
                },
            ]
			});
		}
		
		/*====================================
			Counter Js
		======================================*/ 
		$('.count').counterUp({
			time: 1000
		});

		/*====================================
			Isotop And Masonry Active
		======================================*/ 
		$(window).on('load', function() {
			$('.isotop-active').masonry({
                // options
                itemSelector: '.grid-item',
            });
			custom_js();
			
			if ($.fn.isotope) {
                $(".isotop-active").isotope({
                    filter: '*',
                });

					$('.project-nav ul li').on('click', function() {
                    $(".project-nav ul li").removeClass("active");
                    $(this).addClass("active");

                    var selector = $(this).attr('data-filter');
                    $(".isotop-active").isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'easeOutCirc',
                            queue: false,
                        }
                    });
                    return false;
                });
            }
		});
		/*====================================
			Testimonial Carousel
		======================================*/ 
		$('.testimonial-active').slick({
			autoplay: true,
			autoplaySpeed: 5000,
			arrows: false,
			dots: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			pauseOnHover: false,
			draggable: true,
			fade: true,
			cssEase: 'linear'
		});
		
		/*====================================
			Brand Carousel
		======================================*/ 
		$('.brand-slider').slick({
			autoplay: true,
			autoplaySpeed: 2000,
			speed: 600,
			arrows: false,
			slidesToShow: 6,
			slidesToScroll: 1,
			pauseOnHover: false,
			dots: false,
			draggable: true,
			cssEase: 'linear',
			responsive: [{
                    breakpoint: 780,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                }, {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                },{
                    breakpoint: 340,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                },
            ]
		});
		
		/*====================================
			News Slide
		======================================*/ 
		$('.news-slide').slick({
			autoplay: true,
			autoplaySpeed: 10000,
			speed: 600,
			slidesToShow: 1,
			slidesToScroll: 1,
			pauseOnHover: false,
			dots: false,
			pauseOnDotsHover: true,
			cssEase: 'linear',
			draggable: true,
			prevArrow: '<button class="PrevArrow fa fa-angle-left"></button>',
			nextArrow: '<button class="NextArrow fa fa-angle-right"></button>',
		});	
		
		/*====================================
			Onepage Navigation
		======================================*/ 
		if ($.fn.onePageNav) {
			$('.navbar .nav').onePageNav({
				currentClass: 'current',
				scrollSpeed: 600,
			});
			$('.slicknav_nav').onePageNav({
				currentClass: 'current',
				scrollSpeed: 600,
			});
		};	
		

		/*======================================
			Wow JS
		======================================*/ 		
		var window_width = $(window).width();   
			if(window_width > 767){
            new WOW().init();
		}
		/*====================================
			Extra JS
		======================================*/ 
			
		jQuery(window).on('scroll', function() {
			if ($(this).scrollTop() > 100) {
				$('.header-inner').addClass("sticky");
			} else {
				$('.header-inner').removeClass("sticky");
			}
		});
		
		$('.b-arrow,.btnm,.icon-down,.btn').on("click", function (e) {
			var anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $(anchor.attr('href')).offset().top - 70
				}, 1000);
			e.preventDefault();
		});
		
		$('.social li').on('mouseenter', function(){
			$('.social li').removeClass('active');
			$(this).addClass('active');
		})
		
		$('.single-brand').on('mouseenter', function(){
			$('.single-brand').removeClass('active');
			$(this).addClass('active');
		})

		/*====================================
			Scrool Up
		======================================*/ 	
		$.scrollUp({
			scrollName: 'scrollUp',      // Element ID
			scrollDistance: 300,         // Distance from top/bottom before showing element (px)
			scrollFrom: 'top',           // 'top' or 'bottom'
			scrollSpeed: 1000,            // Speed back to top (ms)
			easingType: 'linear',        // Scroll to top easing (see http://easings.net/)
			animation: 'fade',           // Fade, slide, none
			animationSpeed: 200,         // Animation speed (ms)
			scrollTrigger: false,        // Set a custom triggering element. Can be an HTML string or jQuery object
			scrollTarget: false,         // Set a custom target element for scrolling to. Can be element or number
			scrollText: ["<i class='fa fa-angle-up'></i>"], // Text for element, can contain HTML
			scrollTitle: false,          // Set a custom <a> title if required.
			scrollImg: false,            // Set true to use image
			activeOverlay: false,        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
			zIndex: 2147483647           // Z-Index for the overlay
		});
		
	});
		/*====================================
			Preloader JS
		======================================*/
		$(window).on('load', function() {
				$('.loader').fadeOut('slow', function(){
				$(this).remove();
			});
		});
})(jQuery);
