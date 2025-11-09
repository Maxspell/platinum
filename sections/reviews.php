<?php
$reviews_section = get_field('reviews');

if (empty($reviews_section) || $reviews_section['disabled']) {
    return;
}

$title = $reviews_section['title'] ?? '';
$button = $reviews_section['button'] ?? [];
$list = $reviews_section['list'] ?? [];
?>

<section class="reviews section">
    <div class="container">
        <?php if ($title) : ?>
            <div class="reviews__header">
                <h2 class="reviews__title section-title"><?php echo $title; ?></h2>
                <?php if (!empty($button)) : ?>
                    <a href="<?php echo $button['url']; ?>" class="reviews__social-link button reviews__social-link--instagram" target="_blank">
                        <?php echo $button['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($list)) : ?>
            <div class="swiper reviews__slider">
                <div class="swiper-wrapper">
                    <?php foreach ($list as $item) : ?>
                        <?php $video_src = esc_url($item['video_file']); ?>
                        <div class="swiper-slide reviews__slide">
                            <div class="reviews__video" data-video="<?php echo $video_src; ?>">
                                <video src="<?php echo $video_src; ?>" muted preload="metadata" playsinline></video>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-button swiper-button--prev"></div>
                <div class="swiper-button swiper-button--next"></div>
                <div class="swiper-pagination reviews__pagination"></div>
            </div>
        <?php endif; ?>

        <div class="reviews__grid">
            <div class="reviews__grid-column reviews__grid-column--summary">
                <div class="reviews__card reviews__card--summary">
                    <div class="reviews__summary-stats">
                        <span class="reviews__summary-rating section-title">4.6</span>
                        <span class="reviews__summary-count">444 відгука</span>
                    </div>
                    <a href="#" class="reviews__summary-link">Наш рейтинг на Google</a>
                </div>
                <div class="reviews__card">
                    <div class="reviews__card-header">
                        <div class="reviews__card-avatar">
                            <img src="" alt="">
                        </div>
                        <div class="reviews__card-info">
                            <div class="reviews__card-author">Валентина Хоменко</div>
                            <div class="reviews__card-rating"></div>
                            <div class="reviews__card-date">24 травня 2025</div>
                        </div>
                        <div class="reviews__card-badge"></div>
                    </div>
                    <div class="reviews__card-text">
                        Вже кілька років користуюсь платформою Хорошоп для ведення інтернет-магазину — і це одне з найкращих рішень для e-commerce в Україні. Простий, інтуїтивно зрозумілий конструктор сайту дозволяє швидко запустити сучасний інтернет-магазин з усім необхідним функціоналом: зручна адміністративна панель, інтеграція з Prom, Rozetka, Google Shopping, Nova Poshta, платіжними системами, можливість SEO-налаштувань. Особливо хочеться відзначити підтримку клієнтів — завжди оперативно відповідають, допомагають вирішити будь-яке питання. Постійно додають нові оновлення, адаптуються до ринку, розвиваються разом з бізнесом. Рекомендую Хорошоп усім підприємцям, хто хоче мати надійний, швидкий та красивий інтернет-магазин без зайвих витрат на програмістів. Це ідеальний варіант для малого та середнього бізнесу!
                    </div>
                </div>
            </div>
            <div class="reviews__grid-column">
                <div class="reviews__card">
                    <div class="reviews__card-header">
                        <div class="reviews__card-avatar">
                            <img src="" alt="">
                        </div>
                        <div class="reviews__card-info">
                            <div class="reviews__card-author">Валентина Хоменко</div>
                            <div class="reviews__card-rating"></div>
                            <div class="reviews__card-date">24 травня 2025</div>
                        </div>
                        <div class="reviews__card-badge"></div>
                    </div>
                    <div class="reviews__card-text">
                        Переїзд на платформу Хорошоп був для мене непростим. Спочатку було складно адаптуватися: часто потрапляла до різних менеджерів, через що доводилося по кілька разів повторювати одні й ті ж запитання — це дуже нервувало. Але з часом я розібралася, як правильно формулювати запити, і тоді все кардинально змінилося. Менеджери реагують дуже швидко, навіть у вихідні дні. Консультації завжди вичерпні, з чіткими порадами та прикладами. Зараз я справді задоволена. Платформа зручна, технічна підтримка на високому рівні. Рекомендую!
                    </div>
                </div>
                <div class="reviews__card">
                    <div class="reviews__card-header">
                        <div class="reviews__card-avatar">
                            <img src="" alt="">
                        </div>
                        <div class="reviews__card-info">
                            <div class="reviews__card-author">Валентина Хоменко</div>
                            <div class="reviews__card-rating"></div>
                            <div class="reviews__card-date">24 травня 2025</div>
                        </div>
                        <div class="reviews__card-badge"></div>
                    </div>
                    <div class="reviews__card-text">
                        Працюємо з платформою Хорошоп з 2022 року, подобаються вбудовані функції для налаштування інтернет-магазину та можливість налаштувати все без програмістів
                    </div>
                </div>
            </div>
            <div class="reviews__grid-column">
                <div class="reviews__card">
                    <div class="reviews__card-header">
                        <div class="reviews__card-avatar">
                            <img src="" alt="">
                        </div>
                        <div class="reviews__card-info">
                            <div class="reviews__card-author">Валентина Хоменко</div>
                            <div class="reviews__card-rating"></div>
                            <div class="reviews__card-date">24 травня 2025</div>
                        </div>
                        <div class="reviews__card-badge"></div>
                    </div>
                    <div class="reviews__card-text">
                        Вже кілька років користуюсь платформою Хорошоп для ведення інтернет-магазину — і це одне з найкращих рішень для e-commerce в Україні. Простий, інтуїтивно зрозумілий конструктор сайту дозволяє швидко запустити сучасний інтернет-магазин з усім необхідним функціоналом: зручна адміністративна панель, інтеграція з Prom, Rozetka, Google Shopping, Nova Poshta, платіжними системами, можливість SEO-налаштувань. Особливо хочеться відзначити підтримку клієнтів — завжди оперативно відповідають, допомагають вирішити будь-яке питання. Постійно додають нові оновлення, адаптуються до ринку, розвиваються разом з бізнесом. Рекомендую Хорошоп усім підприємцям, хто хоче мати надійний, швидкий та красивий інтернет-магазин без зайвих витрат на програмістів. Це ідеальний варіант для малого та середнього бізнесу!
                    </div>
                </div>
                <div class="reviews__card">
                    <div class="reviews__card-header">
                        <div class="reviews__card-avatar">
                            <img src="" alt="">
                        </div>
                        <div class="reviews__card-info">
                            <div class="reviews__card-author">Валентина Хоменко</div>
                            <div class="reviews__card-rating"></div>
                            <div class="reviews__card-date">24 травня 2025</div>
                        </div>
                        <div class="reviews__card-badge"></div>
                    </div>
                    <div class="reviews__card-text">
                        Переїзд на платформу Хорошоп був для мене непростим. Спочатку було складно адаптуватися: часто потрапляла до різних менеджерів, через що доводилося по кілька разів повторювати одні й ті ж запитання — це дуже нервувало. Але з часом я розібралася, як правильно формулювати запити, і тоді все кардинально змінилося. Менеджери реагують дуже швидко, навіть у вихідні дні. Консультації завжди вичерпні, з чіткими порадами та прикладами. Зараз я справді задоволена. Платформа зручна, технічна підтримка на високому рівні. Рекомендую!
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="reviews__popup" id="reviewsPopup">
        <div class="reviews__popup-inner">
            <span class="reviews__popup-close">&times;</span>
            <video controls playsinline></video>
        </div>
    </div>
</section>