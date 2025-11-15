<?php
$cases_section = get_field('cases');

if (empty($cases_section) || $cases_section['disabled']) {
    return;
}

$title = $cases_section['title'] ?? '';
$list = $cases_section['list'] ?? [];
?>

<section class="cases section" data-cases>
    <div class="container">
        <?php if ($title) : ?>
            <h2 class="cases__title section-title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if (!empty($list)) : ?>

            <div class="cases__tabs">
                <ul class="cases__tabs-list js-cases-tabs">
                    <?php foreach ($list as $i => $item) : ?>
                        <li class="cases__tabs-item <?php echo $i === 0 ? 'is-active' : ''; ?>"
                            data-main="<?php echo esc_attr($i); ?>">
                            <?php echo esc_html($item['title'] ?? ''); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="cases__subtabs">
                <ul class="cases__subtabs-list js-cases-subtabs"></ul>
            </div>

            <div class="cases__content">
                <div class="cases__slider-wrapper">
                    <div class="cases__slider swiper js-cases-slider">
                        <div class="swiper-wrapper js-cases-slides">
                        </div>

                        <div class="swiper-button swiper-button--prev"></div>
                        <div class="swiper-button swiper-button--next"></div>
                    </div>
                </div>
            </div>

            <script type="application/json" class="cases__data">
                <?php echo wp_json_encode($list); ?>
            </script>

        <?php endif; ?>


    </div>

    <div class="cases__popup" id="casesPopup">
        <div class="cases__popup-inner">
            <span class="cases__popup-close">&times;</span>
            <video controls playsinline></video>
        </div>
    </div>
</section>