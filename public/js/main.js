
    // ------------------------------------------------------- //
    // Tooltips init
    // ------------------------------------------------------ //

    $('.grid').isotope({
        itemSelector: '.grid-item',
        //percentPosition: true,
        masonry: {
            // use element for option
            //columnWidth: '.grid-sizer',
            //columnWidth : 10,
            //isFitWidth: true
            columnWidth: '.grid-item',
            gutter: 0
        }
    }).resize;

    // init Isotope
    let $grid = $('.grid').isotope({
        // options...
    });
    // layout Isotope after each image loads
    $grid.imagesLoaded().progress( function() {
        $grid.isotope('layout');
    });



    /*Nav bar script to open*/
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "20px";
        document.getElementById("main").style.marginLeft = "20px";
        //document.getElementById("overlay").style.width = "100%";
        //document.getElementById("overlay").style.height = "100%";
        /*document.getElementById("overlay").style.backgroundColor = "rgba(0,0,0,0.4)";*/
    }
    /*Script to close nav bar*/
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        //document.getElementById("overlay").style.width = "0%";
        //document.getElementById("overlay").style.height = "0%";
    }


$(document).ready(function () {

    $('[data-toggle="tooltip"]').tooltip()

        /*Menu bar background color change script*/
        $("#menu-click").click(function(event){
            event.preventDefault();
        });
    $("#nav span").css("color", "#EEEEEE");
    $("#phone span").css("border-bottom", "solid 0.0625em", "#EEEEEE");
    $(window).scroll(function () {
        let scrollTop = $(window).scrollTop();
        if (scrollTop > 100) {
            $("#nav").css("background-color", "black");
            $("#nav").css("opacity", "0.7");
            $("#nav span").css("color", "#FF5722");
            $("#phone span").css("border-bottom", "solid 0.0625em", "#FF5722");
        } else {
            $("#nav").css("background-color", "transparent");
            $("#nav").css("opacity", "1.0");
            $("#nav span").css("color", "#EEEEEE");
            $("#phone span").css("border-bottom", "solid 0.0625em", "#EEEEEE");
        }
    });

        /*Smoth transition script*/
        // This is a functions that scrolls to #{blah}link
        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if( target.length ) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top
                }, 1000);
            }
        });

});


    (function($) {
        "use strict";
        /*Function Calls*/
    new WOW().init();

})(jQuery);




    /* ===================================================================
 * Infinity - Main JS
 *
 * ------------------------------------------------------------------- */

    (function($) {

        "use strict";

        let cfg = {
                defAnimation   : "fadeInUp",    // default css animation
                scrollDuration : 800          // smoothscroll duration

            },

            $WIN = $(window);


        // Add the User Agent to the <html>
        // will be used for IE10 detection (Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0))
        let doc = document.documentElement;
        doc.setAttribute('data-useragent', navigator.userAgent);


        /* Smooth Scrolling
          * ------------------------------------------------------ */
        let ssSmoothScroll = function() {

            $('.smoothscroll').on('click', function (e) {
                let target = this.hash,
                    $target    = $(target);

                e.preventDefault();
                e.stopPropagation();

                $('html, body').stop().animate({
                    'scrollTop': $target.offset().top
                }, cfg.scrollDuration, 'swing').promise().done(function () {

                    window.location.hash = target;
                });
            });

        };



        /* Back to Top
          * ------------------------------------------------------ */
        let ssBackToTop = function() {

            let pxShow  = 500,         // height on which the button will show
                fadeInTime  = 400,         // how slow/fast you want the button to show
                fadeOutTime = 400,         // how slow/fast you want the button to hide
                scrollSpeed = 300,         // how slow/fast you want the button to scroll to top. can be a value, 'slow', 'normal' or 'fast'
                goTopButton = $("#go-top")

            // Show or hide the sticky footer button
            $(window).on('scroll', function() {
                if ($(window).scrollTop() >= pxShow) {
                    goTopButton.fadeIn(fadeInTime);
                } else {
                    goTopButton.fadeOut(fadeOutTime);
                }
            });
        };



        /* Initialize
          * ------------------------------------------------------ */
        (function ssInit() {
            ssSmoothScroll();
            ssBackToTop();

        })();


    })(jQuery);


    (function($){

        /**
         * jQuery function to prevent default anchor event and take the href * and the title to make a share popup
         *
         * @param  {[object]} e           [Mouse event]
         * @param  {[integer]} intWidth   [Popup width defalut 500]
         * @param  {[integer]} intHeight  [Popup height defalut 400]
         * @param  {[boolean]} blnResize  [Is popup resizeabel default true]
         */
        $.fn.customerPopup = function (e, intWidth, intHeight, blnResize) {

            // Prevent default anchor event
            e.preventDefault();

            // Set values for window
            intWidth = intWidth || '500';
            intHeight = intHeight || '400';
            strResize = (blnResize ? 'yes' : 'no');

            // Set title and open popup with focus on it
            var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
                strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,
                objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
        }

        /* ================================================== */

        $(document).ready(function ($) {
            $('.customer.share').on("click", function(e) {
                $(this).customerPopup(e);
            });
        });

    }(jQuery));




