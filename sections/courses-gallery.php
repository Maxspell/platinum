<?php
$courses_gallery_section = get_field('courses_gallery');

if (empty($courses_gallery_section) || !empty($courses_gallery_section['disabled'])) {
    return;
}

$title = $courses_gallery_section['title'] ?? '';
$list = $courses_gallery_section['list'] ?? [];
?>

<section class="courses-gallery section" data-courses-gallery>
    <div class="container">
        <?php if ($title) : ?>
            <h2 class="courses-gallery__title section-title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if (!empty($list)) : ?>

            <div class="courses-gallery__tabs">
                <ul class="courses-gallery__tabs-list js-courses-gallery-tabs">
                    <?php foreach ($list as $i => $item) : ?>
                        <li class="courses-gallery__tabs-item <?php echo $i === 0 ? 'is-active' : ''; ?>"
                            data-main="<?php echo esc_attr($i); ?>">
                            <?php echo esc_html($item['title'] ?? ''); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="courses-gallery__subtabs">
                <ul class="courses-gallery__subtabs-list js-courses-gallery-subtabs"></ul>
            </div>

            <div class="courses-gallery__content">
                <div class="courses-gallery__slider-wrapper">
                    <div class="courses-gallery__slider swiper js-courses-gallery-slider">
                        <div class="swiper-wrapper js-courses-gallery-slides">
                        </div>

                        <div class="swiper-button swiper-button--prev"></div>
                        <div class="swiper-button swiper-button--next"></div>
                    </div>
                </div>
            </div>

            <script type="application/json" class="courses-gallery__data">
                <?php echo wp_json_encode($list); ?>
            </script>

        <?php endif; ?>
    </div>

    <div class="courses-gallery__popup" id="coursesGalleryPopup">
        <div class="courses-gallery__popup-inner">
            <span class="courses-gallery__popup-close">&times;</span>
            <video controls playsinline></video>
        </div>
    </div>
</section>
