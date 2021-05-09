$(document).ready(function () {
    var mostswiper = new Swiper('.mostslider > .swiper-container', {
        nextButton: '.most-next',
        prevButton: '.most-prev',
        slidesPerView: 8,
        paginationClickable: true,
        preventClicks: false,
        preventClicksPropagation: false,
        spaceBetween: 10,
        breakpoints: {
            320: {
                slidesPerView: 3,
                spaceBetween: 5
            },

            480: {
                slidesPerView: 3,
                spaceBetween: 5
            },

            768: {
                slidesPerView: 5,
                spaceBetween: 5
            },
            1024: {
                slidesPerView: 6,
                spaceBetween: 10
            }
        }
    });

    var topswiper = new Swiper('.topslider > .swiper-container', {
        nextButton: '.top-next',
        prevButton: '.top-prev',
        slidesPerView: 8,
        paginationClickable: true,
        preventClicks: false,
        preventClicksPropagation: false,
        spaceBetween: 10,
        breakpoints: {
            320: {
                slidesPerView: 3,
                spaceBetween: 5
            },

            480: {
                slidesPerView: 3,
                spaceBetween: 5
            },

            768: {
                slidesPerView: 5,
                spaceBetween: 5
            },
            1024: {
                slidesPerView: 6,
                spaceBetween: 10
            }
        }
    });

    });

