$(document).ready(changeParallax());

function changeParallax(){
    if(window.location.pathname == "/") {
        var width = $(window).width();
        var height = $(window).height();
        if( height > 800){
             $('#tuerca').remove();
             $('#parallax-caption').css("padding-bottom", "20%");
        }
        $('#parallax-1').css({"min-height": height, "min-width": width});
        var bgArray = ['parallax-1 animated fadeInDown','parallax-2 animated fadeInDown','parallax-3 animated fadeInDown', 'parallax-4 animated fadeInDown', 'parallax-5 animated fadeInDown', 'parallax-6 animated fadeInDown'];
        selectBG = bgArray[Math.floor(Math.random() * bgArray.length)];
        $('#parallax-1').addClass(selectBG);
    }
}

$(window).resize(function() {
    if(window.location.pathname == "/") {
        var width = $(window).width();
        var height = $(window).height();
        if(height > 800){
            $('#tuerca').remove();
            $('#parallax-caption').css("padding-bottom", "20%");
        }
        $('#parallax-1').css({"min-height": height, "min-width": width});
    }
});