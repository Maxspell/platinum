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
$email = $footer['email'] ?? [];
$copyright = $footer['copyright'] ?? '';
$contact_form = $footer['contact_form'] ?? '';
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
                <?php if (!empty($phone)) : ?>
                    <div class="footer__phone">
                        <a href="<?php echo $phone['url']; ?>"><?php echo $phone['title']; ?></a>
                    </div>
                <?php endif; ?>
                <?php if (!empty($email)) : ?>
                    <div class="footer__email">
                        <a href="<?php echo $email['url']; ?>"><?php echo $email['title']; ?></a>
                    </div>
                <?php endif; ?>
                <?php if (!empty($copyright)) : ?>
                    <div class="footer__copyright">
                        <span><?php echo $copyright; ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
</div>

<div id="popupForm" class="popup">
    <div class="popup__body">
        <div class="popup__content">
            <div class="popup__content-wrap">
                <?php echo do_shortcode($contact_form); ?>
            </div>
            <div class="contacts__success-content">
                <div class="contacts__success-title section-title"><?php pll_e('Thank you!'); ?></div>
                <div class="contacts__success-message">
                    <?php pll_e('Our manager will contact you shortly for a consultation.'); ?>
                </div>
                <div class="contacts__success-name"></div>
                <div class="contacts__success-phone"></div>
                <button type="button" class="contacts__success-button button"><?php pll_e('Okay, I will wait'); ?></button>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>

</html>