<?php
// Flush rewrite rules for custom post types
add_action('after_switch_theme', function () {
    flush_rewrite_rules();
});

$brands = new CPT(array(
    'post_type_name' => 'Brands',
    'singular' => 'Brand',
    'plural' => 'Brands',
    'slug' => 'Brands'
));

$prisliste = new CPT(array(
    'post_type_name' => 'Prisliste',
    'singular' => 'Prisliste',
    'plural' => 'Prislister',
    'slug' => 'Priser'
));

// $medarbejdere = new CPT(array(
//     'post_type_name' => 'Medarbejdere',
//     'singular' => 'Medarbejder',
//     'plural' => 'Medarbejdere',
//     'slug' => 'Medarbejdere'
// ));
