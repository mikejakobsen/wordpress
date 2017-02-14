<?php
namespace App;

require_once 'utils.php';
/**
 * Global site information
 *
 * Creates a new Option Page
 */

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Opsætning',
        'menu_title' => 'Opsætning',
        'menu_slug' => 'site_info',
        'capability' => 'edit_posts',
        'icon_url' => 'dashicons-info',
        'redirect' => true

    ));
}
