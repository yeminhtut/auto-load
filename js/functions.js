jQuery(document).ready(function($) {
  'use strict';

  $('.vc_element .vc_controls-container .vc_controls-out-tl').removeClass('vc_controls-out-tl').addClass('vc_controls-cc');
  $('.thumbnail, .video-holder, .embed-player, .embed-player p').fitVids(); // video player

  // owl item navigation
  $('.owl-item').on("click", function() {
    $('.owl-item').removeClass('current');
    $(this).addClass('current');
  });

  // Advanced Search Form
  $('.search-trigger').on('click', function() {
      $('#search-full').fadeIn('fast');
  });

  $('#close-search, #search-full .overlay').on('click', function() {
      $('#search-full').fadeOut('fast');
  });

  $('input#s').on('focus', function() {
    $('#advanced-search-form i.live-search-reset').fadeIn();
  });
  
  $('input#s').on('blur', function() {
    $('#advanced-search-form i.live-search-reset').fadeOut();
  });

  $('#advanced-search-form i.live-search-reset').on("click", function() {
    $("input#s").val('');
  });

  // Menu navigation
  $('.site-navigation .menu-item-has-children').on('hover', function() {
    $(this).children('.sub-menu').stop().slideToggle('fast');
  })

  // Search button
  $('.search-trigger').on('click', function(j) {
    $(this).parent().find('.input-wrapper').toggleClass('active')
    j.stopPropagation();
  });

  //  Post slider
  $('.slider-post').on('hover', function() {
    var itemHeight = $(this).find('.entry-meta').height() + $(this).find('p').height();
    $(this).find('.detail-post').stop().animate({
      height: itemHeight
    })
  }, function() {
    var itemHeight = $(this).find('.entry-meta').height() + $(this).find('p').height();
    $(this).find('.detail-post').stop().animate({
      height: 0
    })
  })

  // owl carousel slider
  $('.slider-with-thumbnail-thumbnails').owlCarousel({
      margin: 20,
      nav: false,
      responsive : {
        0 : {
            items: 1,
            startPosition: 1
        },
        480 : {

            items: 2,
            startPosition: 2
        },
        760 : {

            items: 3,
            startPosition: 2
        },
        1000 : {
            items: 4,
            startPosition: 2
        }
      }
    })

  // gmaps
  $('.wpb_gmaps_widget').attr('id', 'map-canvas');

  $(window).on('load', function() {
    // tabs widget
    $('.warrior-tabs-widget .tabs_container').each(function() {
      var defaultHeightSelector = $(this).parent().find('.tab-nav a.active').attr('data-content');
      var defaultHeight = $(defaultHeightSelector).outerHeight();
      $(this).height(defaultHeight);
    });

    $('.preload').fadeOut('slow'); // preloader

    var owl = $('.warrior-carousel-18');
      owl.owlCarousel({
          items:4,
          loop:true,
          autoplay:false,
          autoplayTimeout:1000,
          autoplayHoverPause:true,
          nav: true,
          lazyLoad:true,
          responsive : {
            0 : {
                items: 1,
                startPosition: 0
            },
            480 : {

                items: 2,
                startPosition: 0
            },
            760 : {

                items: 3,
                startPosition: 0
            },
            1000 : {
                items: 4,
                startPosition: 0
            }
          }
      }); 

    // Featured Slider
    // $('.warrior-carousel-4').owlCarousel({
    //   items: 4,
    //   startPosition: 2,
    //   nav: true,
    //   responsive : {
    //     0 : {
    //         items: 1,
    //         startPosition: 1
    //     },
    //     480 : {

    //         items: 2,
    //         startPosition: 2
    //     },
    //     760 : {

    //         items: 3,
    //         startPosition: 2
    //     },
    //     1000 : {
    //         items: 4,
    //         startPosition: 2
    //     }
    //   }
    // });

    // Justified Gallery
    var hentryWidth = $('#primary #single-post article.hentry .entry-content').outerWidth();
    $('.warrior-gallery').justifiedGallery({
        rowHeight: 150,
        maxRowHeight: 0
    });
    $('.justified-gallery').css('width', hentryWidth);
    $('.justified-gallery a').addClass('thickbox');

    // owl carousel recent post by category
    $('.warrior-carousel-3').owlCarousel({
      items: 3,
      startPosition: 1,
      margin: 20,    
      responsive : {
        0 : {
            items: 1,
            startPosition: 1
        },
        760 : {

            items: 2,
            startPosition: 2
        },
        1000 : {
            items: 3,
            startPosition: 2
        }
      }
    });
  });

  // scroll to top
  $(window).on('scroll', function() {
      // Back to top
      var winHeight = 100
      if ($(this).scrollTop() > winHeight) {
           $('#scroll-top').fadeIn();
      } else {
           $('#scroll-top').fadeOut();
      }
  });

  // Go to Top
  $('a[href="#top"]').on('click', function() {
    $('html, body').animate({ scrollTop: 0 }, 'slow');
    return false;
  });

  // tabs widget
  $('.warrior-tabs-widget .tabs_container').each(function() {
    var defaultHeightSelector = $(this).parent().find('.tab-nav a.active').attr('data-content');
    var defaultHeight = $(defaultHeightSelector).outerHeight();
    $(this).height(defaultHeight);
  })

  $(window).on('resize', function() {
    $('.warrior-tabs-widget .tabs_container').each(function() {
      var defaultHeightSelector = $(this).parent().find('.tab-nav a.active').attr('data-content');
      var defaultHeight = $(defaultHeightSelector).outerHeight();
      $(this).height(defaultHeight);
    })
  });

  $(window).trigger('resize');

  // tabs widget
  $('.warrior-tabs-widget .tab-nav a').on('click', function() {
    var tabContent = $(this).attr('data-content');
    var tabHeight = $(tabContent).outerHeight();
    $('.warrior-tabs-widget .tab-nav a').removeClass('active')
    $(this).addClass('active');
    $('.tabs_container').height(tabHeight);
    $('.tab-content').fadeOut();
    $(tabContent).fadeIn();
  });

  // slickNav menu mobile device
  $('#main-menu').slicknav({
    prependTo : '.mobile-menu',
    label: 'Menu'
  });

  $('#top-navigation').slicknav({
    prependTo : '.mobile-top-menu',
    label: 'Menu'
  });
  
  $('#footer-navigation').slicknav({
    prependTo : '.mobile-footer-menu',
    label: 'Menu'
  });

  //$('.wpb_gmaps_widget iframe').addClass('scrolloff'); // set the pointer events to none on doc ready
  // you want to disable pointer events when the mouse leave the canvas area;

  // disable google maps scroll
  $('.wpb_gmaps_widget iframe').mouseleave(function () {
      $('.wpb_gmaps_widget iframe').addClass('scrolloff'); // set the pointer events to none when mouse leaves the map area
  });

  $('form br').remove();
  $('p.form-submit input[type=submit]').addClass('button submit-button');
  $('#comment-form form').addClass('block-form');
  $('#comment-form form p.form-submit').addClass('form-group');

  // Animate Effect (WOW)
  var wow = new WOW({
      boxClass: 'wow', // animated element css class (default is wow)
      animateClass: 'animated', // animation css class (default is animated)
      offset: 0, // distance to the element when triggering the animation (default is 0)
      mobile: true // trigger animations on mobile devices (true is default)
  });
  wow.init();

});