$(document).ready(function () {

    $('#products-categories-slider').owlCarousel({
        // loop: true,
        margin: 10,
        responsiveClass: true,
        navigation: false,
        rtl: true,
        responsive: {
            0: {
                items: 3,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 5,
                nav: true,
                loop: false
            }
        },
    })

    $('.item').on('click', function () {
        $('.item').each(function (e) {
            $(this).removeClass('active-cat-pill');
        });
        $('.product-list-category').each(function () {
            $(this).removeClass('active-cat');
        });


        $(this).addClass('active-cat-pill');
        var activeCategoryId = $(this).attr('data-target');
        $('#' + activeCategoryId).addClass('active-cat');
    });


});
