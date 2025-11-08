<?php
$cases_section = get_field('cases');

if (empty($cases_section) || $cases_section['disabled']) {
    return;
}

$title = $cases_section['title'] ?? '';
$list = $cases_section['list'] ?? [];
?>

<section class="cases section">
    <div class="container">
        <?php if ($title) : ?>
            <h2 class="cases__title section-title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if (!empty($list)) : ?>
            <div class="cases__tabs">
                <ul class="cases__tabs-list">
                    <?php foreach ($list as $index => $item) : ?>
                        <li class="cases__tabs-item <?php echo $index === 0 ? 'is-active' : ''; ?>" data-tab="case-<?php echo $index; ?>">
                            <?php echo esc_html($item['title'] ?? ''); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="cases__content">
                <?php foreach ($list as $index => $item) :
                    $sub_list = $item['sub_list'] ?? [];
                ?>
                    <div class="cases__slider-wrapper <?php echo $index === 0 ? 'is-active' : ''; ?>" id="case-<?php echo $index; ?>">
                        <div class="cases__slider swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($sub_list as $sub_item) : ?>
                                    <div class="cases__slide swiper-slide">
                                        <div class="cases__slide-media">
                                            <div class="cases__slide-image">
                                                <img src="<?php echo esc_url($sub_item['image_1']); ?>" alt="">
                                            </div>
                                            <div class="cases__slide-image">
                                                <img src="<?php echo esc_url($sub_item['image_2']); ?>" alt="">
                                            </div>
                                            <div class="cases__slide-video">
                                                <?php if (!empty($sub_item['video_file'])) : ?>
                                                    <video src="<?php echo esc_url($sub_item['video_file']); ?>" muted playsinline></video>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-button swiper-button--prev"></div>
                            <div class="swiper-button swiper-button--next"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>