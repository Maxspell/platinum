<?php
$hero_section = get_field('hero');

if (empty($hero_section) || $hero_section['disabled']) {
    return;
}

$title = $hero_section['title'] ?? '';
$video = $hero_section['video'] ?? '';
$button = $hero_section['button'] ?? '';
$services = $hero_section['services'] ?? [];
?>

<section class="hero">
    <div class="container">
        <div class="hero__inner">
            <div class="hero__media">
                <img src="<?php echo esc_url($video); ?>" alt="Відео" class="hero__video">
            </div>
            <div class="hero__content">

                <?php if ($title) : ?>
                    <h1 class="hero__title"><?php echo esc_html($title); ?></h1>
                <?php endif; ?>

                <button data-modal="" type="button" class="hero__button button">
                    <?php echo esc_html($button['title']); ?>
                </button>

            </div>

            <?php if (!empty($services)) : ?>
                <div class="hero__services">
                    <ul class="hero__services-list">
                        <?php foreach ($services as $service) :
                            $icon = $service['icon'] ?? '';
                            $title = $service['title'] ?? '';
                        ?>
                            <li class="hero__services-item">
                                <?php if (!empty($icon)) : ?>
                                    <img class="hero__services-icon" src="<?php echo esc_url($icon); ?>" alt="">
                                <?php endif; ?>

                                <?php if ($title) : ?>
                                    <span class="hero__services-title"><?= $title ?></span>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>