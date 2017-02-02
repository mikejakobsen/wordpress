<?php
namespace App;

require_once 'utils.php';


/**
 * Adds the settings to the WordPress menu
 */

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Udseende',
        'menu_title' => 'Udseende',
        'menu_slug' => 'theme_options',
        'parent_slug' => '',
        'capability' => 'edit_posts',
        'position' => '99.2',
        'icon_url' => 'dashicons-admin-site',
        'redirect' => true

    ));
}

/**
 * Define the loaded font family
 */

add_action('after_setup_theme', function () {
    // get theme options
    $font = sage_get_field('font_family');
        if ($font == 1) {
            ?>
            <style type="text/css">
                @import url('https://fonts.googleapis.com/css?family=Lato:300,400,700|Merriweather:300,400,700');
                body {
                    font-family: 'Merriweather', sans-serif;
                }
                h1, h2, h3, h4, h5 {
                    font-family: 'Lato', sans-serif;
                }
            </style>
            <?php
        }
        if ($font == 2) {
            ?>
            <style type="text/css">
                @import url('https://fonts.googleapis.com/css?family=Neuton:300,400,700|Montserrat:300,400,700');
                body {
                    font-family: 'Neuton', sans-serif;
                }
                h1, h2, h3, h4, h5 {
                    font-family: 'Montserrat', sans-serif;
                }
            </style>
            <?php
        }
        if ($font == 3) {
            ?>
            <style type="text/css">
                @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Playfair+Display:400,400i,900');
                body {
                    font-family: 'Open Sans', sans-serif;
                }
                h1, h2, h3, h4, h5 {
                    font-family: 'Playfair Display', sans-serif;
                }
            </style>
            <?php
        }
        if ($font == 4) {
            ?>
            <style type="text/css">
                @import url('https://fonts.googleapis.com/css?family=Oswald:300,400,700|Merriweather:300,400,700');
                body {
                    font-family: 'Merriweather', sans-serif;
                }
                h1, h2, h3, h4, h5 {
                    font-family: 'Oswald', sans-serif;
                }
            </style>
            <?php
        }
});

/**
 * Defines the text color as an option
 */

add_action('after_setup_theme', function () {
    // get theme options
    $text_color = sage_get_field('text_color');

            if ($text_color) {
                ?>
                <style type="text/css">
                    body {
                        color: <?=$text_color?>;

                    }
                </style>
                <?php
            }
});
/**
 * Defines the global link color
 */

add_action('after_setup_theme', function () {
    $link_color = sage_get_field('link_color');

            if ($link_color) {
                ?>
                <style type="text/css">
                    a {
                        color: <?=$link_color?>;

                    }
                </style>
                <?php
            }
});
?>
