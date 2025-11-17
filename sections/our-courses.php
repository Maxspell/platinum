<?php
$our_courses_section = get_field('our_courses');

if (empty($our_courses_section) || $our_courses_section['disabled']) {
    return;
}

$title = $our_courses_section['title'] ?? '';
$list = $our_courses_section['list'] ?? [];
$banner_title = $our_courses_section['banner_title'] ?? '';
$banner_link = $our_courses_section['banner_link'] ?? [];
?>

<section class="our-courses section">
    <div class="container">
        <?php if ($title) : ?>
            <h2 class="our-courses__title section-title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if (!empty($list)) : ?>
            <div class="our-courses__list">
                <?php foreach ($list as $item) :
                    $item_title = $item['title'] ?? '';
                    $item_text = $item['text'] ?? '';
                    $item_label_primary = $item['label_primary'] ?? '';
                    $item_label_secondary = $item['label_secondary'] ?? '';
                    $item_button = $item['button'] ?? [];
                    $item_socials = $item['social_list'] ?? [];
                ?>
                    <article class="our-courses__card">
                        <header class="our-courses__header">
                            <?php if ($item_label_primary) : ?>
                                <span class="our-courses__label our-courses__label--primary">
                                    <?= esc_html($item_label_primary) ?>
                                </span>
                            <?php endif; ?>
                            <?php if ($item_label_secondary) : ?>
                                <span class="our-courses__label our-courses__label--secondary">
                                    <?= esc_html($item_label_secondary) ?>
                                </span>
                            <?php endif; ?>
                        </header>

                        <div class="our-courses__body">
                            <?php if ($item_title) : ?>
                                <h3 class="our-courses__name"><?= esc_html($item_title) ?></h3>
                            <?php endif; ?>

                            <?php if ($item_text) : ?>
                                <div class="our-courses__text"><?= $item_text ?></div>
                            <?php endif; ?>
                        </div>

                        <footer class="our-courses__footer">
                            <?php if (!empty($item_button['title'])) : ?>
                                <button data-modal="<?= esc_url($item_button['url']) ?>" type="button" class="our-courses__button button">
                                    <?= esc_html($item_button['title']) ?>
                                </button>
                            <?php endif; ?>

                            <?php if (!empty($item_socials)): ?>
                                <ul class="social social__list" aria-label="Social links">
                                    <?php foreach ($item_socials as $item):
                                        $icon = $item['icon'];
                                        $link = $item['link'];
                                    ?>
                                        <li class="social__item">
                                            <a class="social__link"
                                                href="<?= esc_url($link['url']); ?>"
                                                target="<?= esc_attr($link['target'] ?: '_blank'); ?>"
                                                aria-label="<?= esc_attr($link['title']); ?>">
                                                <img src="<?= esc_url($icon['url']); ?>" alt="<?= esc_attr($icon['alt']); ?>">
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </footer>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="our-courses__banner banner">
            <div class="banner__inner">
                <div class="banner__col banner__col--left">
                    <div class="banner__title"><?php echo $banner_title; ?></div>
                    <?php if (!empty($banner_link)) : ?>
                        <a href="<?php echo $banner_link['url']; ?>" class="contacts__social-link button contacts__social-link--telegram" target="_blank">
                            <?php echo $banner_link['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="banner__col banner__col--right">
                </div>
            </div>
        </div>
    </div>
</section>