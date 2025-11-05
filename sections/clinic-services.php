<?php
$clinic_services_section = get_field('clinic_services');

if (empty($clinic_services_section) || $clinic_services_section['disabled']) {
    return;
}

$title = $clinic_services_section['title'] ?? '';
$left_list = $clinic_services_section['left_list'] ?? [];
$right_list = $clinic_services_section['right_list'] ?? [];
?>

<section class="services services--clinic section">
    <div class="container">
        <?php if ($title) : ?>
            <h2 class="services__title section-title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <div class="services__columns">
            <?php foreach (['left' => $left_list, 'right' => $right_list] as $side => $list) : ?>
                <?php if (!empty($list)) : ?>
                    <div class="services__column services__column--<?php echo esc_attr($side); ?>">
                        <ul class="services__list">
                            <?php foreach ($list as $item) : ?>
                                <?php
                                $item_title = $item['title'] ?? '';
                                $item_price = $item['price'] ?? '';
                                $sub_services = $item['list'] ?? [];
                                ?>
                                <li class="services__item">
                                    <div class="services__item-header">
                                        <?php if ($item_title) : ?>
                                            <span class="services__item-title"><?php echo esc_html($item_title); ?></span>
                                        <?php endif; ?>
                                        <?php if ($item_price) : ?>
                                            <span class="services__item-price"><?php echo esc_html($item_price); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <?php if (!empty($sub_services)) : ?>
                                        <ul class="services__sub-list">
                                            <?php foreach ($sub_services as $sub) : ?>
                                                <?php
                                                $sub_title = $sub['title'] ?? '';
                                                $sub_price = $sub['price'] ?? '';
                                                ?>
                                                <li class="services__sub-item">
                                                    <?php if ($sub_title) : ?>
                                                        <span class="services__sub-title"><?php echo esc_html($sub_title); ?></span>
                                                    <?php endif; ?>
                                                    <?php if ($sub_price) : ?>
                                                        <span class="services__sub-price"><?php echo esc_html($sub_price); ?></span>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>