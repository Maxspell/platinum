<?php
$dental_courses_section = get_field('dental_courses');

if (empty($dental_courses_section) || $dental_courses_section['disabled']) {
    return;
}

$title = $dental_courses_section['title'] ?? '';
$left_text = $dental_courses_section['left_text'] ?? '';
$right_text = $dental_courses_section['right_text'] ?? '';
$author_name = $dental_courses_section['author_name'] ?? '';
$author_image = $dental_courses_section['author_image'] ?? '';
$author_description = $dental_courses_section['author_description'] ?? '';
$video_file = $dental_courses_section['video_file'] ?? '';
?>

<section class="dental-courses section">
    <div class="container">
        <?php if ($title) : ?>
            <h2 class="dental-courses__title section-title"><?= $title ?></h2>
        <?php endif; ?>

        <div class="dental-courses__columns">
            <div class="dental-courses__column dental-courses__column--left">
                <div class="dental-courses__left-text">
                    <?= $left_text ?>
                </div>

                <div class="dental-courses__author">
                    <div class="dental-courses__author-image">
                        <img src="<?= $author_image ?>" alt="">
                    </div>
                    <div class="dental-courses__author-info">
                        <div class="dental-courses__author-name">
                            <?= $author_name ?>
                        </div>
                        <div class="dental-courses__author-description">
                            <?= $author_description ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="dental-courses__column dental-courses__column--right">
                <div class="dental-courses__right-text">
                    <?= $right_text ?>
                </div>
            </div>
        </div>
        <?php if ($video_file) : ?>
            <div class="dental-courses__media" data-video="<?php echo $video_file; ?>">
                <video src="<?php echo esc_url($video_file); ?>" muted playsinline class="dental-courses__video"></video>
            </div>
        <?php endif; ?>
    </div>
    <div class="dental-courses__popup" id="dentalCoursesPopup">
        <div class="dental-courses__popup-inner">
            <span class="dental-courses__popup-close">&times;</span>
            <video controls playsinline></video>
        </div>
    </div>
</section>