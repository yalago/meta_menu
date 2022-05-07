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


    $('#product-carousel').owlCarousel({
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

    $('#menu-trigger').on('click', function () {
        $('#main-menu').slideToggle();
    });

    $('.add-to-cart-in-list').on('click', function () {
        $('#home-products-list').hide();
        $('.add-to-cart-pressed').slideToggle();
    });

    $('.add-to-cart-pressed .close-button').on('click', function () {
        $('#home-products-list').slideToggle();
        $('.add-to-cart-pressed').hide();
    });
    if ($('.status-container.active').length > 0) {
        let reachedToActive = false;
        $('.status-container').each(function () {
            if ($(this).hasClass('active') || reachedToActive) {
                reachedToActive = true;
                return;
            }
            $(this).addClass('active');
        });
    }

    $('.increment-decrement.increment').on('click', function () {
        $('.product-quantity').text(parseInt($('.product-quantity').text()) + 1);
    });
    $('.increment-decrement.decrement').on('click', function () {
        if (parseInt($('.product-quantity').text()) == 0) return;
        $('.product-quantity').text(parseInt($('.product-quantity').text()) - 1);
    });


});


function togglePlayVideo(event) {
    var element = event.currentTarget;
    if (event.classList.contains("playing")) {
        event.classList.remove("playing");
        this.stopVideo(event.parentElement.parentElement);
    } else {
        event.classList.add("playing");
        this.playVideo(event.parentElement.parentElement);
    }
}
function stopVideo(e) {
    e.querySelector("img").style.display = "block";
    e.querySelector("video").style.display = "none";
    e.querySelector("video").pause();
}
function playVideo(e) {
    e.querySelector("img").style.display = "none";
    e.querySelector("video").style.display = "block";
    e.querySelector("video").play();
}

function redirectBack() {
    if (history.length)
        history.back()
    window.location.href = window.homeURL;
}

