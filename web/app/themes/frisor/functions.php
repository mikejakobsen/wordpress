<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */
/**

 * 1. WordPress detects theme in themes/sage
 * 2. When we activate, we tell WordPress that the theme is actually in themes/sage/templates
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage
 *
 * We do this so that the Template Hierarchy will look in themes/sage/templates for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage
 *
 * themes/sage/index.php also contains some self-correcting code, just in case the template option gets reset
 */

/**
 * Require Composer autoloader if installed on it's own
 */
if (file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    require_once $composer;
}

add_filter('template', function ($stylesheet) {
    return dirname($stylesheet);
});
add_action('after_switch_theme', function () {
    $stylesheet = get_option('template');
    if (basename($stylesheet) !== 'templates') {
        update_option('template', $stylesheet . '/templates');
    }
});

/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
    'src/acf-config.php',   // Custom ACF settings
    'src/helpers.php',      // Admin Utility functions
    'src/setup.php',        // Theme setup
    'src/theme-settings.php',        // Theme setup
    'src/theme-options.php',        // Theme setup
    'src/filters.php',      // Filters
    'src/admin.php',        // Admin Utility functions
    'src/actions.php',      // Actions
    'src/post-types.php',   // Custom Post Types,
    'vendor/jjgrainger/wp-custom-post-type-class/src/CPT.php',   // Create Post Types,
];

array_walk($sage_includes, function ($file) {
    if (!locate_template($file, true, true)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
    }
});
