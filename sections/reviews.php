<?php
$reviews_section = get_field('reviews');

if (empty($reviews_section) || $reviews_section['disabled']) {
    return;
}

$title = $reviews_section['title'] ?? '';
$button = $reviews_section['button'] ?? [];
$list = $reviews_section['list'] ?? [];
$shortcode = $reviews_section['shortcode'] ?? '';
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

        <div class="reviews__widget">
            <?php echo do_shortcode($shortcode); ?>
        </div>
    </div>


    <div class="reviews__popup" id="reviewsPopup">
        <div class="reviews__popup-inner">
            <span class="reviews__popup-close">&times;</span>
            <video controls playsinline></video>
        </div>
    </div>
</section>