import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.esm.browser.min.js'

export default class HeaderSliderBuilder {
    static build(){
        const slider = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,

            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },


            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    }
}
