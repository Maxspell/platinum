<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package platinum
 */

?>
<?php
$footer = get_field('footer', 'options');
$logo = $footer['logo'] ?? '';
$phone = $footer['phone'] ?? [];
$copyright = $footer['copyright'] ?? '';
?>
<footer class="footer">
    <div class="container container--secondary">
        <div class="footer__inner">
            <div class="footer__top">

                <div class="footer__logo">
                    <a href="/" class="logo">
                        <img src="<?= esc_url($logo); ?>" alt="Стоматологічна клініка PLATINUM CLINIC" class="logo__image">
                    </a>
                </div>

            </div>

            <div class="footer__bottom">
                <div class="footer__phone">
                    <a href="<?php echo $phone['url']; ?>"><?php echo $phone['title']; ?></a>
                </div>
                <div class="footer__copyright">
                    <span><?php echo $copyright; ?></span>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<div id="popupForm" class="popup">
    <div class="popup__body">
        <div class="popup__content">
            <div class="popup__content-wrap">
                <?php echo do_shortcode('[contact-form-7 id="52a0100" title="Contact Form" html_class="contacts-form"]'); ?>
            </div>
            <div class="contacts__success-content">
                <div class="contacts__success-title section-title">Дякуємо!</div>
                <div class="contacts__success-message">
                    Найближчим часом з Вами зв’яжеться наш менеджер для консультації.
                </div>
                <div class="contacts__success-name"></div>
                <div class="contacts__success-phone"></div>
                <button type="button" class="contacts__success-button button">Добре, чекатиму</button>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>

</html>