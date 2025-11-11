<?php
$why_us_section = get_field('why_us');

if (empty($why_us_section) || $why_us_section['disabled']) {
    return;
}

$title = $why_us_section['title'] ?? '';
$list = $why_us_section['list'] ?? [];
?>

<section class="why-us section">
    <div class="container">
        <h2 class="why-us__title section-title">
            <?php echo esc_html($title); ?>
        </h2>
        <?php if (!empty($list)) : ?>
            <div class="why-us__list">
                <?php foreach ($list as $item) :
                    $item_title = $item['title'] ?? '';
                    $item_description = $item['description'] ?? '';
                    $item_image = $item['image'] ?? '';
                ?>
                    <div class="why-us__item" style="--bg-image: url('<?php echo esc_url($item_image); ?>')">
                        <div class="why-us__item-content">
                            <div class="why-us__item-title">
                                <?= $item_title ?>
                            </div>
                            <div class="why-us__item-text">
                                <?= $item_description ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>