$( function() {
    $('.toogle-menu').click(function () {
        if($('.wrapper').hasClass('toggled')){
            $('.wrapper').removeClass("toggled");
        }else{
            $('.wrapper').addClass("toggled");
        }
        
    })
});