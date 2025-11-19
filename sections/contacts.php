<?php
$contacts_section = get_field('contacts');

if (empty($contacts_section) || $contacts_section['disabled']) {
    return;
}

$title = $contacts_section['title'] ?? '';
$schedule = $contacts_section['schedule'] ?? '';
$phone = $contacts_section['phone'] ?? '';
$address = $contacts_section['address'] ?? '';
$social_list = $contacts_section['social_list'] ?? [];
$contact_form = $contacts_section['contact_form'] ?? '';
$google_map = $contacts_section['google_map'] ?? '';
?>

<section class="contacts section">
    <div class="container">
        <?php if ($title) : ?>
            <h2 class="contacts__title section-title"><?php echo $title; ?></h2>
        <?php endif; ?>
        <div class="contacts__columns">
            <div class="contacts__column">
                <div class="contacts__schedule">
                    <?php echo $schedule; ?>
                </div>
                <div class="contacts__phone">
                    <a href="<?php echo $phone['url']; ?>"><?php echo $phone['title']; ?></a>
                </div>
                <div class="contacts__address">
                    <?php echo $address; ?>
                </div>
                <?php if (!empty($social_list)) : ?>
                    <div class="contacts__social-title"><?php pll_e('Social networks'); ?></div>
                    <ul class="contacts__social">
                        <?php foreach ($social_list as $item) : ?>
                            <li>
                                <a href="<?php echo $item['link']['url']; ?>" class="contacts__social-link button contacts__social-link--<?php echo $item['icon_class']; ?>" target="_blank">
                                    <?php echo $item['link']['title']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="contacts__column">
                <div class="contacts__form">
                    <?php echo do_shortcode($contact_form); ?>
                </div>

                <div class="contacts__success">
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
        <div class="contacts__map">
            <?php echo $google_map; ?>
        </div>
    </div>
</section>