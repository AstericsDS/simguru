import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

const swiper = new Swiper('.swiper', {
    autoplay: {
        delay: 5000,
    },
    effect: "coverflow",
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

function initCampusSwiper() {
    const swiperEl = document.querySelector('.viewUnit');
    if (swiperEl && !swiperEl.classList.contains('swiper-initialized')) {
        new Swiper('.viewUnit', {
            autoplay: {
                delay: 5000,
            },
            loop: true,
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
              type: "progressbar",
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
                hideOnClick: true,
            },
            effect: "fade",
        });
    }
}

// Run again after Livewire navigation
document.addEventListener("livewire:navigated", () => {
    initCampusSwiper();
});
