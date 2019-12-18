$(document).ready(function(){

    //$("#menu input").on("focus", function(){
            
            //$("li.search").addClass("ativo");

        //}).on("blur", function(){

          //$("li.search").removeClass("ativo");

    //});

    $(".thumbnails").owlCarousel({
        loop:true,
        margin: 10,
        dots: false,
        //nav:false,
        //navText: ["Anterior","Próximo"],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 3
            },
            1000: {
                items: 4
            },
        }
    });
    var owl = $('.owl-carousel');
    owl.owlCarousel();
    // Go to the next item
    $('#btn-news-next').click(function() {
        owl.trigger('next.owl.carousel');
    })
    // Go to the previous item
    $('#btn-news-prev').click(function() {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl.trigger('prev.owl.carousel', [300]);
})

    $("#page-up").on("click", function(event){

        $("body").animate({
            scrollTop:0   
        }, 1000);

        event.preventDefault();

    });
    $("#btn-bars").on("click", function(){
        $("header").toggleClass("open-menu");
    });
    $("#menu-mobile-mask, .btn-close").on("click", function(){
        $("header").removeClass("open-menu");
    });

    $("#btn-search").on("click", function(){
        $("header").toggleClass("open-search");
        $("#input-search-mobile").focus();
    });
});