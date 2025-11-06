<?php
$doctors_section = get_field('doctors');

if (empty($doctors_section) || $doctors_section['disabled']) {
    return;
}

$title = $doctors_section['title'] ?? '';
$list = $doctors_section['list'] ?? [];
?>

<section class="doctors section">
    <div class="container">
        <h2 class="doctors__title section-title">
            <?php echo esc_html($title); ?>
        </h2>
        <?php if (!empty($list)) : ?>
            <div class="doctors__slider swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($list as $item) :
                        $item_title = $item['title'] ?? '';
                        $item_description = $item['description'] ?? '';
                        $item_image = $item['image'] ?? '';
                    ?>
                        <div class="doctors__slide swiper-slide">
                            <div class="doctors__slide-image">
                                <img src="<?php echo esc_url($item_image); ?>" alt="">
                            </div>
                            <div class="doctors__slide-title">
                                <?= $item_title ?>
                            </div>
                            <div class="doctors__slide-text">
                                <?= $item_description ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button swiper-button--prev"></div>
                <div class="swiper-button swiper-button--next"></div>
            </div>
        <?php endif; ?>
    </div>
</section>