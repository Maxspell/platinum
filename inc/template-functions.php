<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package platinum
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function platinum_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (! is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (! is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'platinum_body_classes');

/**
 * Adds SVG to the list of files allowed for uploading.
 */
function platinum_svg_upload_allow($mimes)
{
    $mimes['svg']  = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'platinum_svg_upload_allow');


/**
 * Fix MIME type for SVG files.
 */
function platinum_fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{
    if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) {
        $dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
    } else {
        $dosvg = ('.svg' === strtolower(substr($filename, -4)));
    }

    if ($dosvg) {
        if (current_user_can('manage_options')) {
            $data['ext']  = 'svg';
            $data['type'] = 'image/svg+xml';
        } else {
            $data['ext']  = false;
            $data['type'] = false;
        }
    }

    return $data;
}
add_filter('wp_check_filetype_and_ext', 'platinum_fix_svg_mime_type', 10, 5);

/* Disable auto tag <p> and line breaks in contact form 7 */
add_filter('wpcf7_autop_or_not', '__return_false');

add_filter('nav_menu_css_class', function ($classes, $item, $args, $depth) {
    $classes[] = 'menu__item';
    return $classes;
}, 10, 4);

add_filter('nav_menu_link_attributes', function ($atts, $item, $args, $depth) {
    $atts['class'] = (isset($atts['class']) ? $atts['class'] . ' ' : '') . 'menu__link';
    return $atts;
}, 10, 4);
