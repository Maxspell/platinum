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
                    <a href="<?php echo $button['url']; ?>" class="reviews__social-link button reviews__social-link--instagram">
                        <?php echo $button['title']; ?>
                    </a>
                <?php endif; ?>

                <?php if (!empty($list)) : ?>
                    <div class="swiper reviews__slider">
                        <div class="swiper-wrapper">
                            <?php foreach ($list as $item) : ?>
                                <div class="swiper-slide reviews__slide">
                                    <?php if (!empty($item['video_file'])) : ?>
                                        <video src="<?php echo esc_url($item['video_file']); ?>"></video>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>