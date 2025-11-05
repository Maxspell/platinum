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
            <div class="doctors__list">
                <?php foreach ($list as $item) :
                    $item_title = $item['title'] ?? '';
                    $item_description = $item['description'] ?? '';
                    $item_image = $item['image'] ?? '';
                ?>
                    <div class="doctors__item">
                        <div class="doctors__item-image">
                            <img src="<?php echo esc_url($item_image); ?>" alt="">
                        </div>
                        <div class="doctors__item-title">
                            <?= $item_title ?>
                        </div>
                        <div class="doctors__item-text">
                            <?= $item_description ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>