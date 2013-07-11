/**
 * paolettibibite
 * custom script for site
 */
( function( $ ){

    $(window).load(function() {
       paolettibibite_load();
    });

    $('#nav').localScroll(800);
    $('.slide a[href^=#]').localScroll(800);

    //Scrolldown Birra
    $("#birra .closed").click(function(){
        $(this).parent().slideUp(400,'easeInOutExpo');
        return false;
    });
    $(window).scroll(function(){
        $("#birra").delay(1200).slideUp(400,'easeInOutExpo');
    });

    $('.slider').bind('inview', function (event, visible) {
        if (visible == true) {
            $(this).addClass("inview");
        } else {
            $(this).removeClass("inview");
        }
    });

    $('.slide').each(function() {
        $(this).parallax("50%", 0.3);
    });
    $('.bubble').each(function() {
        $(this).parallax("50%", 0.1);
    });
    // $('.slide').parallax("50%", 0.2);
    //$('.bubble').parallax("50%", 0.1);

    $('.slide .obj1').each(function(){
        $(this).parallax("50%", 0.6 );
    });
    $('.slide .obj2').each(function(){
        $(this).parallax("50%", 0.4 );
    });
    $('.slide .obj3').each(function(){
        $(this).parallax("50%", -0.3 );
    });
    $('.slide .obj4').each(function(){
        $(this).parallax("50%", -0.4 );
    });

    //fancybox open gallery
    //$('a.fancybox').fancybox();

    //Carousel
    $('#gallery-products').bxSlider({
        minSlides: 1,
        maxSlides: 5,
        slideWidth: 175,
        slideMargin: 0
    });

    //Ajax loader dialog sinle product
    $('.action').click(function() {
        var link = $(this).attr('href');
        $('.result').load(link + " section.single-product", function(response, status, xhr) {
            //console.log(xhr);

            if (status == "success") {
                //dialog product
                $('.result').dialog({
                    modal: true,
                    show: {
                        effect: "fade",
                        duration: 600
                    },
                    hide: {
                        effect: "fade",
                        duration: 400
                    }
                });
                return false;
            }
            else {
                var msg = "Sorry but there was an error: ";
                $("#error").html(msg + xhr.status + " " + xhr.statusText);
            }
        });
        return false;

    });

})(jQuery);
//Ajax open file product
//var dvs;

function paolettibibite_load(){
    jQuery("#loader").slideUp(1000,'easeInOutExpo');
   /*.queue(function () {
        //Slide Birra
        jQuery("#birra").delay(2600).slideDown(800,'easeInOutExpo');
    });*/
}

