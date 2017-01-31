<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    // Add page slug if it doesn't exist
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }
    // Add class if sidebar is active
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }
    return $classes;
});
/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});
/**
 * Template Hierarchy should search for .blade.php files
 */
array_map(function ($tag) {
    add_filter("{$tag}_template_hierarchy", function ($templates) {
        return array_merge(str_replace('.php', '.blade.php', $templates), $templates);
    });
}, [
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment'
]);
/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    $data = array_reduce(get_body_class(), function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    echo template($template, $data);
    // Return a blank file to make WordPress happy
    return get_template_directory() . '/index.php';
}, PHP_INT_MAX);

/**
 * Tell WordPress how to find the compiled path of comments.blade.php
 */
add_filter('comments_template', 'App\\template_path');

add_filter('script_loader_tag', function ($tag, $handle) {
    if (!is_admin()) {
        return str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}, 10, 2);

add_filter('acf/fields/google_map/api', function ($api) {
    $api['key'] = env('GMAP_KEY');
    return $api;
});

add_filter('ignite-flexible-layout', function ($template) {
    return str_replace("_", "-", $template);
});
