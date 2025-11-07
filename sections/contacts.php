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
                    <div class="contacts__social-title">Соцмережі</div>
                    <ul class="contacts__social">
                        <?php foreach ($social_list as $item) : ?>
                            <li>
                                <a href="<?php echo $item['link']['url']; ?>" class="contacts__social-link button contacts__social-link--<?php echo $item['icon_class']; ?>">
                                    <?php echo $item['link']['title']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="contacts__column">
                <div class="contacts__form">
                    <form class="contacts-form" action="#" method="post">
                        <h3 class="contacts-form__title">Зворотній зв’язок</h3>

                        <div class="contacts-form__fields">
                            <div class="contacts-form__field">
                                <input type="text" name="name" id="contacts-name" class="contacts-form__input" placeholder="Ім’я та Прізвище" required>
                            </div>

                            <div class="contacts-form__field">
                                <input type="tel" name="phone" id="contacts-phone" class="contacts-form__input" placeholder="+380" required>
                            </div>
                        </div>

                        <div class="contacts-form__agreement">
                            <label class="contacts-form__checkbox">
                                <input type="checkbox" name="agreement" required>
                                <span class="contacts-form__checkmark"></span>
                            </label>
                            <p class="contacts-form__text">Погоджуюсь з умовами обробки персональних даних</p>
                        </div>

                        <button type="submit" class="contacts-form__button button">Отримати дзвінок</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="contacts__map">
            <?php echo $google_map; ?>
        </div>
    </div>
</section>