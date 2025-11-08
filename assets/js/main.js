document.addEventListener('DOMContentLoaded', () => {
    const headers = document.querySelectorAll('.services__item-header');

    headers.forEach(header => {
        header.addEventListener('click', () => {
            const subList = header.nextElementSibling;

            header.classList.toggle('active');

            if (subList && subList.classList.contains('services__sub-list')) {
                subList.classList.toggle('active');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const courseTexts = document.querySelectorAll('.our-courses__text');

    courseTexts.forEach(textBlock => {
        textBlock.addEventListener('click', () => {
            textBlock.classList.toggle('is-open');

            if (textBlock.classList.contains('is-open')) {
                textBlock.style.height = textBlock.scrollHeight + 'px';
            } else {
                textBlock.style.height = '18rem';
            }
        });
    });
});


const initSwiper = () => {
    if (typeof Swiper !== 'undefined') {
        new Swiper('.services__slider', {
            slidesPerView: 1,
            spaceBetween: 0,
            grabCursor: true,
            loop: true,
            navigation: {
                nextEl: '.services__slider .swiper-button--next',
                prevEl: '.services__slider .swiper-button--prev',
            },
        });

        new Swiper('.doctors__slider', {
            slidesPerView: 1.5,
            spaceBetween: 16,
            grabCursor: true,
            loop: true,
            navigation: {
                nextEl: '.doctors__slider .swiper-button--next',
                prevEl: '.doctors__slider .swiper-button--prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 3,
                },
            },
        });
    }
};

document.addEventListener("DOMContentLoaded", () => {
    initSwiper();
});

document.addEventListener('DOMContentLoaded', () => {
    const tabButtons = document.querySelectorAll('.cases__tabs-item');
    const sliderWrappers = document.querySelectorAll('.cases__slider-wrapper');

    // Инициализация Swiper для каждого слайдера
    const sliders = [];
    document.querySelectorAll('.cases__slider').forEach((el) => {
        const swiper = new Swiper(el, {
            slidesPerView: 1,
            spaceBetween: 24,
            navigation: {
                nextEl: el.querySelector('.swiper-button--next'),
                prevEl: el.querySelector('.swiper-button--prev'),
            },
            loop: true,
        });
        sliders.push(swiper);
    });

    // Переключение табов
    tabButtons.forEach((tab) => {
        tab.addEventListener('click', () => {
            const targetId = tab.dataset.tab;

            tabButtons.forEach((t) => t.classList.remove('is-active'));
            sliderWrappers.forEach((w) => w.classList.remove('is-active'));

            tab.classList.add('is-active');
            document.getElementById(targetId).classList.add('is-active');
        });
    });
});
