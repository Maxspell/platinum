<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package platinum
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="wrapper">
        <?php
        $header  = get_field('header', 'options');
        $logo    = $header['logo'] ?? '';
        $address = $header['address'] ?? '';
        $phone   = $header['phone'] ?? [];
        $schedule = $header['schedule'] ?? '';
        $socials = $header['social_list'] ?? [];
        ?>

        <header class="header">
            <div class="container">
                <div class="header__inner">

                    <div class="header__left">
                        <nav class="lang" aria-label="Language switcher">
                            <?php
                            $languages = pll_the_languages([
                                'raw' => true,
                                'hide_if_empty' => false,
                                'display_names_as' => 'slug',
                            ]);

                            if ($languages):
                                $current_lang = null;
                                foreach ($languages as $lang) {
                                    if (!empty($lang['current_lang'])) {
                                        $current_lang = $lang;
                                        break;
                                    }
                                }
                                if (!$current_lang) {
                                    $first = reset($languages);
                                    $current_lang = is_array($first) ? $first : null;
                                }
                            ?>
                                <ul class="lang__list">
                                    <li class="lang__item lang__item--active">
                                        <a href="<?= esc_url($current_lang['url'] ?? '#'); ?>" class="lang__link">
                                            <?= esc_html(strtoupper($current_lang['slug'] ?? '')); ?>
                                        </a>
                                        <ul class="lang__dropdown">
                                            <?php foreach ($languages as $lang): ?>
                                                <?php if (empty($lang['current_lang'])): ?>
                                                    <li class="lang__dropdown-item">
                                                        <a href="<?= esc_url($lang['url'] ?? '#'); ?>" class="lang__dropdown-link">
                                                            <?= esc_html(strtoupper($lang['slug'] ?? '')); ?>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        </nav>
                        <address class="header__address">
                            <span><?= $address; ?></span>
                        </address>
                    </div>

                    <div class="header__logo">
                        <a href="/" class="logo">
                            <img src="<?= esc_url($logo); ?>" alt="Стоматологічна клініка PLATINUM CLINIC" class="logo__image">
                        </a>
                    </div>

                    <div class="header__right">
                        <?php if (!empty($socials)): ?>
                            <ul class="social social__list" aria-label="Social links">
                                <?php foreach ($socials as $item):
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
                    </div>

                    <div class="header__burger burger-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <div class="header__mobile-menu">
                        <div class="contacts__address">
                            <?= $address; ?>
                        </div>
                        <?php if (!empty($phone)): ?>
                            <div class="contacts__phone">
                                <a href="<?= $phone['url']; ?>"><?= $phone['title']; ?></a>
                            </div>
                        <?php endif; ?>
                        <div class="contacts__schedule">
                            <?= $schedule; ?>
                        </div>
                        <?php if (!empty($socials)): ?>
                            <ul class="social social__list" aria-label="Social links">
                                <?php foreach ($socials as $item):
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
                    </div>

                </div>
            </div>
        </header>