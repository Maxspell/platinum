<?php

/**
 * Adds Polylang strings.
 */
function platinum_polylang_strings()
{
    if (! function_exists('pll_register_string')) {
        return;
    }

    pll_register_string(
        'title-social-networks',
        'Social networks',
        'Theme',
        false
    );

    pll_register_string(
        'title-thank-you',
        'Thank you!',
        'Theme',
        false
    );

    pll_register_string(
        'title-our-manager',
        'Our manager will contact you shortly for a consultation.',
        'Theme',
        false
    );

    pll_register_string(
        'title-okay-wait',
        'Okay, I will wait',
        'Theme',
        false
    );
}
add_action('init', 'platinum_polylang_strings');

if (! function_exists('pll__')) {
    function pll__($string)
    {
        return $string;
    }
}

if (! function_exists('pll_e')) {
    function pll_e($string)
    {
        echo $string;
    }
}
