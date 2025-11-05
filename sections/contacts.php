<?php
$contacts_section = get_field('contacts');

if (empty($contacts_section) || $contacts_section['disabled']) {
    return;
}

$title = $contacts_section['title'] ?? '';
$subtitle = $contacts_section['subtitle'] ?? '';
$email = $contacts_section['email'] ?? '';
$phone_list = $contacts_section['phone_list'] ?? '';
$text = $contacts_section['text'] ?? '';
$button = $contacts_section['button'] ?? '';
$donate_title = $contacts_section['donate_title'] ?? '';
$donate_subtitle = $contacts_section['donate_subtitle'] ?? '';
$donate_button = $contacts_section['donate_button'] ?? '';
$donate_card = $contacts_section['donate_card'] ?? '';
$donate_text = $contacts_section['donate_text'] ?? '';
?>

<section id="contacts" class="contacts section">
    <div class="container container--primary">
        <div class="contacts__inner">
            <div class="contacts__content">
                <h2 class="contacts__title section-title"><?php echo $title; ?></h2>
                <div class="contacts__subtitle"><?php echo $subtitle; ?></div>
                <div class="contacts__email">
                    <a href="<?php echo $email['url']; ?>"><?php echo $email['title']; ?></a>
                </div>
                <?php if ($phone_list) : ?>
                    <ul class="contacts__phone-list">
                        <?php foreach ($phone_list as $phone) : ?>
                            <li class="contacts__phone-item">
                                <a href="<?php echo $phone['item']['url']; ?>"><?php echo $phone['item']['title']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="contacts__text">
                    <?php echo $text; ?>
                </div>
                <a href="<?php echo esc_url($button['url']); ?>" class="contacts__button button button--secondary">
                    <span><?php echo esc_html($button['title']); ?></span>
                    <svg class="arrow-btn" aria-hidden="true">
                        <use href="/wp-content/themes/platinum/assets/icons/icons.svg#arrow-btn"></use>
                    </svg>
                </a>
            </div>
            <div class="contacts__donate">
                <div class="contacts__donate-title section-title"><?php echo $donate_title; ?></div>
                <div class="contacts__donate-subtitle"><?php echo $donate_subtitle; ?></div>
                <div class="contacts__donate-buttons">
                    <a href="<?php echo esc_url($donate_button['url']); ?>" class="contacts__donate-button button">
                        <span><?php echo esc_html($donate_button['title']); ?></span>
                        <svg class="arrow-btn" aria-hidden="true">
                            <use href="/wp-content/themes/platinum/assets/icons/icons.svg#arrow-btn"></use>
                        </svg>
                    </a>
                    <div class="contacts__donate-card">
                        <?php echo $donate_card; ?>
                    </div>
                </div>
                <div class="contacts__donate-text">
                    <?php echo $donate_text; ?>
                </div>
            </div>
        </div>
    </div>
</section>