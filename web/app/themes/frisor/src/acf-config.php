<?php

namespace Roots\Sage\Acf;

    /**
     * ACF Settings
     *
     * @link http://www.advancedcustomfields.com/resources/local-json/
     * @link http://www.advancedcustomfields.com/resources/acfsettings/
     * @link http://www.advancedcustomfields.com/resources/including-acf-in-a-plugin-theme/
     */

/**
 * Changes the ACF JSON default  path
 *
 * @param $path ACF JSON path.
 * @return string
 */

add_filter('acf/settings/save_json', function ($path) {

    // update path
    $path = get_template_directory() . '/fields/acf-json';


    // return
    return $path;
});

/**
 * Updates the ACF JSON loading paths
 *
 * @param $paths ACF JSON path.
 * @return array
 */
add_filter('acf/settings/load_json', function ($paths) {

    // append path
    $paths[] = get_template_directory() . '/fields/acf-json';

    // return
    return $paths;
});

/**
 * Disables the ACF Interface
 *
 */
//add_filter('acf/settings/show_admin', '__return_false');
