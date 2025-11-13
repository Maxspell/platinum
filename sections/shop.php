<?php
$shop_section = get_field('shop');

if (empty($shop_section) || $shop_section['disabled']) {
    return;
}

$title = $shop_section['title'] ?? '';
$subtitle = $shop_section['subtitle'] ?? '';
$description = $shop_section['description'] ?? '';
$button_1 = $shop_section['button_1'] ?? '';
$button_2 = $shop_section['button_2'] ?? '';
$product_list = $shop_section['product_list'] ?? [];
?>

<section class="shop section">
    <div class="container">
        <div class="shop__columns">

            <div class="shop__column">
                <?php if ($title) : ?>
                    <h2 class="shop__title section-title"><?php echo $title; ?></h2>
                <?php endif; ?>

                <?php if ($subtitle) : ?>
                    <div class="shop__subtitle"><?php echo $subtitle; ?></div>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="shop__description"><?php echo $description; ?></div>
                <?php endif; ?>

                <div class="shop__buttons">
                    <button data-modal="<?php echo $button_1['url']; ?>" class="shop__button button"><?php echo $button_1['title']; ?></button>
                    <a href="<?php echo $button_2['url']; ?>" class="shop__button button"><?php echo $button_2['title']; ?></a>
                </div>
            </div>
            <div class="shop__column">
                <?php if (!empty($product_list)) : ?>
                    <div class="shop__products">
                        <?php foreach ($product_list as $item) : ?>
                            <div class="shop__product">
                                <div class="shop__product-image">
                                    <img src="<?php echo $item['image']['url']; ?>" alt="<?php esc_attr($item['image']['alt']); ?>">
                                </div>
                                <div class="shop__product-title">
                                    <?php echo $item['title']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>