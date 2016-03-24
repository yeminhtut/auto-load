jQuery(document).ready(function($) {
  'use strict';

      var sticky = $('#ads-banner');
        if (sticky.length) {
            var stickySidebar = $('#sticky_div').offset().top; 
        };
        var sidebarHeight = $('.sidebar').height() + 400;
        var articleHeight = $('#primary').height();
        var sidebarWidth  = $('#secondary-content').width();
        var windowWidth   = $(window).width();
        if (windowWidth > 1000) {
            sticky_sidebar(stickySidebar,sidebarHeight,articleHeight,sidebarWidth,windowWidth);
        }        
        $(window).bind('resizeEnd', function() {
            var sidebarHeight = $('.sidebar').height() + 400;
            var articleHeight = $('#primary').height();
            var sidebarWidth  = $('#secondary-content').width();
            var newWindowWidth   = $(window).width();
            //console.log('window size changed and stop now. Window size now is' + newWindowWidth);
            if (newWindowWidth>1000) {
                var newstickySidebar = stickySidebar;          
                var sidebarWidth  = $('#secondary-content').width(); 
                $('#sidebar-wrapper').css({width:sidebarWidth});                  
                sticky_sidebar(newstickySidebar,sidebarHeight,articleHeight,sidebarWidth,newWindowWidth);
            }            
            if (newWindowWidth < 1000) {
                $('#sidebar-wrapper').removeClass("sticky-sidebar" );
                var sidebarWidth  = $('#secondary-content').width();
                $('#sidebar-wrapper').css({
                        width:sidebarWidth
                    });
                };
            //reposition popup
            if($('.pop-up-form-wrap').is(':visible')){
                var lyr_cont_height = $('.pop-up-form-wrap').height();
                var windowHeight = $(window).height();
                var div_top = (windowHeight/2) - (lyr_cont_height/2);
                if ($(window).height() > 627) {             
                    $('.pop-up-form-wrap').css("top",  div_top);
                }
                else{
                    $('.pop-up-form-wrap').css("width",'100%');
                }
                var half_of_div = 785/2;
                $('.pop-up-form-wrap').css({
                    left: ((newWindowWidth / 2) - half_of_div)
                });
            }
        });

        $(window).resize(function() {
            if(this.resizeTO) clearTimeout(this.resizeTO);
            this.resizeTO = setTimeout(function() {
                $(this).trigger('resizeEnd');
            }, 300);
        });

        function sticky_sidebar(stickySidebar,sidebarHeight,articleHeight,sidebarWidth,windowWidth){ 
            var stickySidebar = stickySidebar;
            var sidebarHeight = sidebarHeight;
            var articleHeight = articleHeight;
            var sidebarWidth = sidebarWidth;
            var windowWidth  = windowWidth;
            if (windowWidth > 1000) { 
                $(window).on('scroll',function(){
                    var div_show = false; 
                        if (($('#advertisement .pop-up-form-wrap').css('display') == 'block')) {
                            var div_show = true;                        
                        }
                    var windowWidth = $(window).width();                     
                    if ($(document).scrollTop() > stickySidebar && articleHeight > sidebarHeight && div_show==false && windowWidth > 1000) {
                        $('#sidebar-wrapper').addClass('sticky-sidebar');
                        $('#non_sticky_wrapper').css('display','none');
                        $('#sidebar-wrapper').css({
                            width:sidebarWidth
                        });
                    } 
                    else {                    
                        $('#sidebar-wrapper').removeClass('sticky-sidebar');
                        $('#non_sticky_wrapper').css('display','block');
                    }
                });
            }; 
        };
    /*Menu Hover*/
    
    $('.menu-item-has-children').hover(function(){
          var menu_child_id = $(this).attr("data-id");
          $('#'+menu_child_id).toggle(200);
        }); 
    
    /*Edit here*/
    // if( /iPad/i.test(navigator.userAgent) ) {
    //   $('.menu-item-has-children').click(function(){
    //       var menu_child_id = $(this).attr("data-id");
    //       $('#'+menu_child_id).toggle(200);
    //     }); 
    // }
    // else{
    //     $('.menu-item-has-children').hover(function(){
    //       var menu_child_id = $(this).attr("data-id");
    //       $('#'+menu_child_id).toggle(200);
    //     }); 
    // }

    /*sidebar popup*/
    if ($(window).width() < 768) {$('#ads-banner').hide();};
    $('.close-modal').click(function(){
            $('.pop-up-form-wrap').hide();
            $('#magazine_modal').hide();
            $('body').css({
                    overflow: 'auto',
                });
        });
    $('.ads-banner-link').click(function(){ 
            var pop_up_id = $(this).attr("data-id");
            var ads_form = $('#'+pop_up_id).html();         
            $('#magazine_modal').show();
            $('.background').show();
            $('#sidebar-wrapper').removeClass('sticky-sidebar');
            $('#ads-success').html('');
            $('#ads_form').show();
            $('#'+pop_up_id).show();
            var windowWidth = $(window).width();
            var pop_up_div = $('#'+pop_up_id).children();  

            pop_up_div.show();          
            var half_of_div = 785/2;
            var lyr_cont = pop_up_div;
            var lyr_cont_height = lyr_cont.height() + 62;
            var windowHeight = $(window).height();
            var div_top = (windowHeight/2) - (lyr_cont_height/2);
            if ($(window).height() > 627) {             
                $('.pop-up-form-wrap').css("top",  div_top);
            }
            else{
                $('.pop-up-form-wrap').css("top",  '0px');
                $('.pop-up-form-wrap').css("left", '0px');
                $('.pop-up-form-wrap').css("margin-top", '0px');
                $('.pop-up-form-wrap').css("padding", '10px');
                $('.ads-widget-des').css('display','none');
                $('.popup_title').css('font-size','16px');
                $('.listing-container .row').css('margin-top','10px');
                $('.white-layer').css('display','none');
            }
            //lyr_cont.css("left", '0px');
            if (windowWidth > 768) {
                lyr_cont.css({
                    left: ((windowWidth / 2) - half_of_div)
                });
            };
            if (windowWidth < 769) {
                lyr_cont.css({
                    left: 0,
                    width: '100%',
                    height: '100%',                 
                });
                $('body').css({
                    overflow: 'hidden',
                });
                $('.addthis-smartlayers-mobile').hide();
            };
        });
    
    /*subscribe popup*/

// jQuery(document).ready(function($) {
//         //if (!$.cookie("magSubscribed")) {
//             call_signup_dialog($);
//             console.log('does not exist');
//         // } else {
//         //     $("#mag-model").hide();
//         //     console.log('exist');
//         // }
// });
function show_subscribe_pop_up(){
    clear_cookie();
    call_signup_dialog();
}
function clear_cookie(){
    $.removeCookie('magSubscribed', { path: '/' });
}
function call_signup_dialog($){
        var lyr_cont = jQuery($('#dialog-form'));
        var lyr_cont_height = lyr_cont.height();
        console.log($(window).width());

        if ($(window).height() > lyr_cont_height) {
            lyr_cont.css("top", "50%");
            lyr_cont.css("margin-top", "-" + ((lyr_cont_height / 2)) + "px");
        }

        if ($(window).width() < 640) {
            lyr_cont.css({
                "left": "0",
                "top":"0",
                "margin-top":"20px"
            });
            $('#email-input').css({
                "width" : "100%",
                "float" : "none"
            });
            $('.form-button').css({
                "width" : "100%",
                "float" : "none"
            });
        }
        else{
            var dialogWidth = lyr_cont.width();
            var windowWidth = $(window).width();
            lyr_cont.css({
                left: (windowWidth / 2) - (643 / 2)
            });
        }
        
        setTimeout(function() {
            $("#mag-model").show();
            $("#mag-model").css({
                "width": "100%"
            });
            $('#dialog-form').css({
                "display": "block"
            });

            $('.btn-close-splash-img').show();
            $('.btn-close-splash-btn').show();

        }, 3000);

        $('.close-modal').click(function() {
            $.cookie("magSubscribed", 1, {
                expires: 1,path:'/'
            });
            $("#mag-model").hide();
            $('#dialog-form').hide();
            $('.btn-close-splash-img').hide();
            $('.btn-close-splash-btn').hide();
            $('html, body').css({
                'overflow': 'auto',
                'height': 'auto'
            });
        });
};

});