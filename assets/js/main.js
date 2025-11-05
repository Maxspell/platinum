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
    }
};

document.addEventListener("DOMContentLoaded", () => {
    initSwiper();
});
