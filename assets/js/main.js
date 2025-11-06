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
