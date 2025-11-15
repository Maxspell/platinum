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
        new Swiper('.reviews__slider', {
            slidesPerView: 1.3,
            spaceBetween: 16,
            grabCursor: true,
            loop: true,
            navigation: {
                nextEl: '.reviews__slider .swiper-button--next',
                prevEl: '.reviews__slider .swiper-button--prev',
            },
            pagination: {
                el: '.reviews__pagination',
                type: 'progressbar',
            },
            breakpoints: {
                768: {
                    slidesPerView: 3,
                },
            },
        });

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

function initCasesSlider() {
    const section = document.querySelector('[data-cases]');

    if (!section) return;

    const tabsMain = section.querySelector('.js-cases-tabs');
    const tabsSub = section.querySelector('.js-cases-subtabs');
    const slidesWrapper = section.querySelector('.js-cases-slides');
    const jsonEl = section.querySelector('.cases__data');
    const sliderEl = section.querySelector('.js-cases-slider');

    if (!tabsMain || !tabsSub || !slidesWrapper || !jsonEl || !sliderEl) return;

    let data;
    try {
        data = JSON.parse(jsonEl.textContent);
    } catch (e) {
        console.error('JSON parse error', e);
        return;
    }

    let mainIndex = 0;
    let subIndex = 0;
    let swiperInstance = null;

    function createSwiper() {
        if (swiperInstance) swiperInstance.destroy(true, true);

        swiperInstance = new Swiper(sliderEl, {
            slidesPerView: 1,
            spaceBetween: 0,
            grabCursor: true,
            loop: true,
            navigation: {
                nextEl: sliderEl.querySelector('.swiper-button--next'),
                prevEl: sliderEl.querySelector('.swiper-button--prev'),
            },
            breakpoints: {
                768: { slidesPerView: 3 },
            },
        });
    }

    function renderSubTabs() {
        tabsSub.innerHTML = '';

        const subTabs = data[mainIndex]?.sub_tabs || [];

        subTabs.forEach((sub, i) => {
            const li = document.createElement('li');
            li.className = 'cases__subtabs-item' + (i === subIndex ? ' is-active' : '');
            li.dataset.sub = i;
            li.textContent = sub.title || `Tab ${i + 1}`;
            tabsSub.appendChild(li);
        });

        bindSubTabEvents(); // <— КРИТИЧЕСКИ ВАЖНО
    }

    function renderSlides() {
        slidesWrapper.innerHTML = '';

        const subList = data[mainIndex]?.sub_tabs?.[subIndex]?.sub_list || [];

        subList.forEach(slide => {
            const root = document.createElement('div');
            root.className = 'cases__slide swiper-slide';

            if (slide.type === 'image') {
                root.innerHTML = `
                    <div class="cases__slide-media">
                        <div class="cases__slide-image">
                            <img src="${slide.image}" alt="">
                        </div>
                    </div>`;
            }

            if (slide.type === 'file') {
                root.innerHTML = `
                    <div class="cases__slide-media">
                        <div class="cases__slide-video" data-video="${slide.video_file}">
                            <video src="${slide.video_file}" muted playsinline></video>
                        </div>
                    </div>`;
            }

            slidesWrapper.appendChild(root);
        });

        createSwiper();
    }

    function bindSubTabEvents() {
        const subTabs = tabsSub.querySelectorAll('.cases__subtabs-item');

        subTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                subIndex = Number(tab.dataset.sub);

                // active class
                subTabs.forEach(t => t.classList.remove('is-active'));
                tab.classList.add('is-active');

                // перерисовываем слайды
                renderSlides();
            });
        });
    }

    function bindMainTabEvents() {
        const mainTabs = tabsMain.querySelectorAll('.cases__tabs-item');

        mainTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                mainIndex = Number(tab.dataset.main);
                subIndex = 0;

                mainTabs.forEach(t => t.classList.remove('is-active'));
                tab.classList.add('is-active');

                renderSubTabs(); // <-- ЭТО генерирует новые подтабы + ВЫЗЫВАЕТ bindSubTabEvents

                renderSlides();  // <-- создаёт новый слайдер
            });
        });
    }

    // INIT
    bindMainTabEvents();
    renderSubTabs();
    renderSlides();
}

document.addEventListener("DOMContentLoaded", () => {
    initSwiper();
    initCasesSlider();
});


document.addEventListener('DOMContentLoaded', () => {
    const videos = document.querySelectorAll('.reviews__video video');
    const popup = document.getElementById('reviewsPopup');
    const popupVideo = popup.querySelector('video');
    const closeBtn = popup.querySelector('.reviews__popup-close');
    const body = document.body;

    videos.forEach(video => {
        video.addEventListener('mouseenter', () => video.play());
        video.addEventListener('mouseleave', () => {
            video.pause();
            video.currentTime = 0;
        });

        video.addEventListener('click', e => {
            const src = e.currentTarget.closest('.reviews__video').dataset.video;
            popupVideo.src = src;
            popup.classList.add('is-active');
            body.classList.add('lock');
            popupVideo.play();
        });
    });

    const closePopup = () => {
        popup.classList.remove('is-active');
        body.classList.remove('lock');
        popupVideo.pause();
        popupVideo.src = '';
    };

    closeBtn.addEventListener('click', closePopup);

    popup.addEventListener('click', e => {
        if (e.target === popup) {
            closePopup();
        }
    });

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && popup.classList.contains('is-active')) {
            closePopup();
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const videos = document.querySelectorAll('.cases__slide-video video');
    const popup = document.getElementById('casesPopup');
    const popupVideo = popup.querySelector('video');
    const closeBtn = popup.querySelector('.cases__popup-close');
    const body = document.body;

    videos.forEach(video => {
        video.addEventListener('mouseenter', () => video.play());
        video.addEventListener('mouseleave', () => {
            video.pause();
            video.currentTime = 0;
        });

        video.addEventListener('click', e => {
            const src = e.currentTarget.closest('.cases__slide-video').dataset.video;
            popupVideo.src = src;
            popup.classList.add('is-active');
            body.classList.add('lock');
            popupVideo.play();
        });
    });

    const closePopup = () => {
        popup.classList.remove('is-active');
        body.classList.remove('lock');
        popupVideo.pause();
        popupVideo.src = '';
    };

    closeBtn.addEventListener('click', closePopup);

    popup.addEventListener('click', e => {
        if (e.target === popup) {
            closePopup();
        }
    });

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && popup.classList.contains('is-active')) {
            closePopup();
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const formWrapper = document.querySelector('.contacts__form');
    const successWrapper = document.querySelector('.contacts__success');
    const successName = document.querySelector('.contacts__success-name');
    const successPhone = document.querySelector('.contacts__success-phone');
    const successButton = document.querySelector('.contacts__success-button');

    // Проверка на наличие всех ключевых элементов
    if (!formWrapper || !successWrapper) return;

    // Настраиваем плавность появления (один раз)
    formWrapper.style.transition = 'opacity 0.4s ease';
    successWrapper.style.transition = 'opacity 0.4s ease';

    // При успешной отправке формы CF7
    document.addEventListener('wpcf7mailsent', function (event) {
        const form = event.target;

        // Проверяем, что событие относится именно к этой форме
        if (!formWrapper.contains(form)) return;

        const nameInput = form.querySelector('input[name="your-name"]');
        const phoneInput = form.querySelector('input[name="your-phone"]');

        const nameValue = nameInput ? nameInput.value.trim() : '';
        const phoneValue = phoneInput ? phoneInput.value.trim() : '';

        if (successName) successName.textContent = nameValue ? `Ім'я: ${nameValue}` : '';
        if (successPhone) successPhone.textContent = phoneValue ? `Телефон: ${phoneValue}` : '';

        // Анимация — скрываем форму, показываем success
        formWrapper.style.opacity = '0';
        setTimeout(() => {
            formWrapper.style.display = 'none';
            successWrapper.style.display = 'block';
            requestAnimationFrame(() => {
                successWrapper.style.opacity = '1';
            });
        }, 400);
    });

    // Обратное действие — кнопка "Добре, чекатиму"
    if (successButton) {
        successButton.addEventListener('click', () => {
            successWrapper.style.opacity = '0';
            setTimeout(() => {
                successWrapper.style.display = 'none';
                formWrapper.style.display = 'block';
                requestAnimationFrame(() => {
                    formWrapper.style.opacity = '1';
                });
            }, 400);
        });
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const videos = document.querySelectorAll('.dental-courses__video');
    const popup = document.getElementById('dentalCoursesPopup');
    const popupVideo = popup.querySelector('video');
    const closeBtn = popup.querySelector('.dental-courses__popup-close');
    const body = document.body;

    videos.forEach(video => {
        video.addEventListener('mouseenter', () => video.play());
        video.addEventListener('mouseleave', () => {
            video.pause();
            video.currentTime = 0;
        });

        video.addEventListener('click', e => {
            const src = e.currentTarget.closest('.dental-courses__media').dataset.video;
            popupVideo.src = src;
            popup.classList.add('is-active');
            body.classList.add('lock');
            popupVideo.play();
        });
    });

    const closePopup = () => {
        popup.classList.remove('is-active');
        body.classList.remove('lock');
        popupVideo.pause();
        popupVideo.src = '';
    };

    closeBtn.addEventListener('click', closePopup);

    popup.addEventListener('click', e => {
        if (e.target === popup) closePopup();
    });

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && popup.classList.contains('is-active')) closePopup();
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const burger = document.querySelector('.burger-menu');
    const menu = document.querySelector('.header__mobile-menu');

    if (burger && menu) {
        burger.addEventListener('click', () => {
            const isOpen = menu.classList.toggle('is-open');
            burger.classList.toggle('active', isOpen);
        });
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const popup = document.querySelector('#popupForm');
    const popupContentWrap = popup?.querySelector('.popup__content-wrap');
    const successContent = popup?.querySelector('.contacts__success-content');
    const successButton = popup?.querySelector('.contacts__success-button');

    document.querySelectorAll('[data-modal="#popup"]').forEach(btn => {
        btn.addEventListener('click', e => {
            e.preventDefault();
            popup?.classList.add('open');
            document.body.classList.add('lock');
        });
    });

    const closePopup = () => {
        popup?.classList.remove('open');
        document.body.classList.remove('lock');

        if (popupContentWrap && successContent) {
            popupContentWrap.style.display = '';
            successContent.style.display = 'none';
        }
    };

    popup?.addEventListener('click', e => {
        if (e.target === popup || e.target.classList.contains('popup__body')) {
            closePopup();
        }
    });

    successButton?.addEventListener('click', () => {
        closePopup();
    });

    document.addEventListener('wpcf7mailsent', event => {
        if (popupContentWrap && successContent) {
            popupContentWrap.style.display = 'none';
            successContent.style.display = 'block';
            successContent.style.opacity = '0';
            setTimeout(() => {
                successContent.style.transition = 'opacity 0.3s ease';
                successContent.style.opacity = '1';
            }, 10);
        }

        const form = event.target;
        const nameInput = form.querySelector('[name="your-name"]');
        const phoneInput = form.querySelector('[name="your-phone"]');

        const name = nameInput?.value?.trim() || '';
        const phone = phoneInput?.value?.trim() || '';

        const nameEl = popup.querySelector('.contacts__success-name');
        const phoneEl = popup.querySelector('.contacts__success-phone');

        if (nameEl) nameEl.textContent = name ? `Ім'я: ${name}` : '';
        if (phoneEl) phoneEl.textContent = phone ? `Телефон: ${phone}` : '';
    });
});

window.addEventListener('load', () => {
    document.querySelectorAll('video').forEach(video => {
        video.load();
    });
});

