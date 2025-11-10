(function ($) {
    "use strict";

    // Spinner - Optimized
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);
    
    
    // Initiate the wowjs - Only if element exists
    if (typeof WOW !== 'undefined') {
        new WOW().init();
    }
    

    // Sticky Navbar - Optimized with debouncing
    var lastScrollTop = 0;
    var ticking = false;
    
    function updateNavbar() {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > 45) {
            $('.nav-bar').addClass('sticky-scrolled');
        } else {
            $('.nav-bar').removeClass('sticky-scrolled');
        }
        ticking = false;
    }
    
    $(window).on('scroll', function () {
        if (!ticking) {
            window.requestAnimationFrame(updateNavbar);
            ticking = true;
        }
    });
    
    // Ensure navbar is visible on page load
    $(document).ready(function() {
        $('.nav-bar').css('top', '0');
    });


    // Header carousel - Only initialize if element exists
    if ($(".header-carousel").length > 0 && typeof $.fn.owlCarousel !== 'undefined') {
        $(".header-carousel").owlCarousel({
            animateOut: 'fadeOut',
            items: 1,
            margin: 0,
            stagePadding: 0,
            autoplay: true,
            smartSpeed: 500,
            dots: true,
            loop: true,
            nav : true,
            navText : [
                '<i class="bi bi-arrow-left"></i>',
                '<i class="bi bi-arrow-right"></i>'
            ],
            lazyLoad: true
        });
    }



    // testimonial carousel - Only initialize if element exists
    if ($(".testimonial-carousel").length > 0 && typeof $.fn.owlCarousel !== 'undefined') {
        $(".testimonial-carousel").owlCarousel({
            autoplay: true,
            smartSpeed: 1500,
            center: false,
            dots: false,
            loop: true,
            margin: 25,
            nav : true,
            navText : [
                '<i class="fa fa-arrow-right"></i>',
                '<i class="fa fa-arrow-left"></i>'
            ],
            responsiveClass: true,
            lazyLoad: true,
            responsive: {
                0:{
                    items:1
                },
                576:{
                    items:1
                },
                768:{
                    items:2
                },
                992:{
                    items:2
                },
                1200:{
                    items:2
                }
            }
        });
    }


    // Facts counter - Only initialize if element exists
    if ($('[data-toggle="counter-up"]').length > 0 && typeof $.fn.counterUp !== 'undefined') {
        $('[data-toggle="counter-up"]').counterUp({
            delay: 5,
            time: 2000
        });
    }


   // Back to top button - Optimized with debouncing
   var backToTopTicking = false;
   
   function updateBackToTop() {
       var scrollTop = $(window).scrollTop();
       if (scrollTop > 300) {
           $('.back-to-top').fadeIn('slow');
       } else {
           $('.back-to-top').fadeOut('slow');
       }
       backToTopTicking = false;
   }
   
   $(window).on('scroll', function () {
       if (!backToTopTicking) {
           window.requestAnimationFrame(updateBackToTop);
           backToTopTicking = true;
       }
   });
   
   $('.back-to-top').on('click', function (e) {
       e.preventDefault();
       $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
       return false;
   });


})(jQuery);

