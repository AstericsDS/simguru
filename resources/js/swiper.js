import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

function initAllSwipers() {
    // 1. Initialize the Coverflow Swiper (.swiper)
    const swiperElements = document.querySelectorAll('.swiper');
    swiperElements.forEach(el => {
        // Prevent initializing the same slider twice if Livewire caches the DOM
        if (!el.classList.contains('swiper-initialized')) {
            new Swiper(el, {
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
                loop: false,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        }
    });

    // 2. Initialize the Campus View Swiper (.viewUnit)
    const viewUnitElements = document.querySelectorAll('.viewUnit');
    viewUnitElements.forEach(el => {
        // Prevent initializing the same slider twice
        if (!el.classList.contains('swiper-initialized')) {
            new Swiper(el, {
                autoplay: {
                    delay: 5000,
                },
                loop: false,
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
    });
}

// Run on initial page load (for the very first time the user arrives)
document.addEventListener('DOMContentLoaded', () => {
    initAllSwipers();
});

// Run every time Livewire navigates to a new page
document.addEventListener("livewire:navigated", () => {
    initAllSwipers();
});