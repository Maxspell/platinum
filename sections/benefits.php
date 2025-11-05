<?php
$benefits_section = get_field('benefits');

if (empty($benefits_section) || $benefits_section['disabled']) {
    return;
}

$label = $benefits_section['label'] ?? '';
$title = $benefits_section['title'] ?? '';
$list = $benefits_section['list'] ?? '';
?>

<section id="benefits" class="benefits section">
    <div class="container container--primary">
        <div class="section-label"><?php echo $label; ?></div>
        <h2 class="benefits__title section-title"><?php echo $title; ?></h2>
        <?php if ($list) : ?>
            <ul class="benefits__list">
                <?php foreach ($benefits_section['list'] as $index => $item) : ?>
                    <li class="benefits__item">
                        <span class="benefits__item-num"><?= sprintf('%02d', $index + 1) ?>/</span>
                        <div class="benefits__item-title"><?php echo $item['title']; ?></div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>