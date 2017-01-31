<?php
namespace App;

require_once 'utils.php';
/**
 * Admin Utility functions
 *
 * Creates a new Option Page
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

    acf_add_options_page(array(
        'page_title' => 'FrisørWeb',
        'menu_title' => 'FrisørWeb',
        'menu_slug' => 'admin_options',
        'capability' => 'edit_posts',
        'position' => '99.3',
        'icon_url' => 'dashicons-info',
        'redirect' => true

    ));
}

/**
 * Updates Theme Options after theme is activated
 */
add_action('after_setup_theme', function () {

    //update field disable_logo
    sage_update_field('disable_logo', 0);

    //update field update_logo
    sage_update_field('update_logo', 0);

    //update field upload_logo
    $logo_url = get_template_directory_uri() . '/images/admin/tema-logo.png';
    sage_update_field('upload_logo', $logo_url);

    //update field update_favicon
    sage_update_field('update_favicon', 0);

    //update field upload_favicon
    $upload_favicon = get_template_directory_uri() . '/images/favicon.ico';
    sage_update_field('upload_favicon', $upload_favicon);

    //update field disable_icon
    sage_update_field('disable_icon', 0);

    //update field update_icon
    sage_update_field('update_icon', 0);

    //update field upload_icon
    $upload_icon = asset_path('images/logo-white.png');
    sage_update_field('upload_icon', $upload_icon);

    //update field enable_about_menu
    sage_update_field('enable_about_menu', 0);

    //update field enable_wordpress_menu
    sage_update_field('enable_wordpress_menu', 0);

    //update field enable_doc_menu
    sage_update_field('enable_doc_menu', 0);

    //update field enable_forums_menu
    sage_update_field('enable_forums_menu', 0);

    //update field enable_feedback_menu
    sage_update_field('enable_feedback_menu', 0);

    //update field enable_site_menu
    sage_update_field('enable_site_menu', 1);

    //update field enable_top_comments_menu
    sage_update_field('enable_top_comments_menu', 0);

    //update field enable_new_menu
    sage_update_field('enable_new_menu', 0);

    //update field enable_updates_menu
    sage_update_field('enable_updates_menu', 0);

    //update field enable_posts_menu
    sage_update_field('enable_posts_menu', 1);

    //update field enable_media_menu
    sage_update_field('enable_media_menu', 1);

    //update field enable_pages_menu
    sage_update_field('enable_pages_menu', 1);

    //update field enable_comments_menu
    sage_update_field('enable_comments_menu', 0);

    //update field enable_appearance_menu
    sage_update_field('enable_appearance_menu', 1);

    //update field enable_plugins_menu
    sage_update_field('enable_plugins_menu', 1);

    //update field enable_users_menu
    sage_update_field('enable_users_menu', 1);

    //update field enable_tools_menu
    sage_update_field('enable_tools_menu', 1);

    //update field enable_settings_menu
    sage_update_field('enable_settings_menu', 1);

    //update field enable_wp_dashboard
    sage_update_field('enable_wp_dashboard', 0);

    //update field enable_wp_rightnow
    sage_update_field('enable_wp_rightnow', 0);

    //update field enable_wp_quickdraft
    sage_update_field('enable_wp_quickdraft', 0);

    //update field enable_wp_activity
    sage_update_field('enable_wp_activity', 0);

    //update field enable_wp_wordpressnews
    sage_update_field('enable_wp_wordpressnews', 0);

    //update field disable_controlpanel
    sage_update_field('disable_controlpanel', 0);

    //update field control_panel_title
    $cp_title = 'FrisørWeb indstillinger';
    sage_update_field('control_panel_title', $cp_title);

    //update field control_panel_message
    $cp_message = '<p>Velkommen til din nye FrisørWeb hjemmeside. </p>'
        . '<p>Brug venligst et øjeblik med at kigge de relevante indstillinger igennem.</p>'
        . '<p>Du finder alle de relevante indstillinger i menu til venstre.</p>';
    sage_update_field('control_panel_message', $cp_message);

    //update field disable_technicalinfo
    sage_update_field('disable_technicalinfo', 0);

    //update field release_date
    sage_update_field('release_date', date('j F, Y'));

    //update field latest_date
    sage_update_field('latest_date', date('j F, Y'));

    $sage_theme = wp_get_theme();

    //update field theme_name
    sage_update_field('theme_name', $sage_theme->get('Name'));

    //update field theme_version
    sage_update_field('theme_version', $sage_theme->get('Version'));

    //update field disable_rss
    sage_update_field('disable_rss', 0);

    //update field rss_title
    $rss_title = 'Frisørweb Nyheder';
    sage_update_field('rss_title', $rss_title);

    //update field rss_feed
    $rss_feed = 'http://todayilearned.dk/feed.xml';
    sage_update_field('rss_feed', $rss_feed);

    //update fb widget code
    $fb_widget_code = '<div class="fb-page" data-href="https://www.facebook.com/hoeksdk/?fref=ts"
data-tabs="timeline" data-width="500" data-small-header="true" data-adapt-container-width="true"
data-hide-cover="true" data-show-facepile="false"><div class="fb-xfbml-parse-ignore">
<blockquote cite="https://www.facebook.com/hoeksdk/?fref=ts">
<a href="https://www.facebook.com/hoeksdk/?fref=ts">Høks.dk</a></blockquote></div></div>';
    sage_update_field('fb_widget_code', $fb_widget_code);

    //update field disable_support
    sage_update_field('disable_support', 0);

    //update field support_logo
    $support_logo = asset_path('images/admin/tema-logo.png');
    sage_update_field('support_logo', $support_logo);

    //update field support_url
    $support_url = 'http://xn--hks-0na.dk/kontakt/';
    sage_update_field('support_url', $support_url);

    //update field support_message
    $support_message = '<p>Skriv til os, hvis du har spørgsmål.</p>';
    sage_update_field('support_message', $support_message);

    //update field disable_en_del_af
    sage_update_field('disable_en_del_af', 0);

    //update field update_en_del_af
    $update_en_del_af = 'Hoeks.dk';
    sage_update_field('update_en_del_af', $update_en_del_af);

    //update field disable_wordpress_version
    sage_update_field('disable_wordpress_version', 0);
});

/**
 * Disables the Admin Bar in the front-end area.
 */
add_filter('show_admin_bar', '__return_false');


/**
 * Inserts a custom Admin WordPress CSS stylesheet.
 * #Todo: Next release
 */
add_action('admin_head', function () {
    wp_enqueue_style('admin_css', asset_path('styles/admin/admin.css'));

    wp_enqueue_script('admin_js', asset_path('scripts/admin/admin.js'));
});

/**
 * Inserts a custom Login WordPress CSS stylesheet.
 */
add_action('login_head', function () {
    // get theme options
    $disable_logo = sage_get_field('disable_logo');
    $update_logo = sage_get_field('update_logo');

    if (!$disable_logo) {
        if ($update_logo) {
            $upload_logo = sage_get_field('upload_logo');

            if ($upload_logo) {
                ?>
                <style type="text/css">
                    .login h1 a {
                        background-image: none, url(<?php _e($upload_logo) ?>) !important;
                    }
                </style>
                <?php
            }
        }
    }
});

/**
 * Login assets
 */
add_action('login_enqueue_scripts', function () {
    wp_enqueue_style('login-css', asset_path('styles/admin/login.css'), false, null);
    wp_enqueue_script('sage/login-js', asset_path('scripts/admin/admin.js'), ['jquery'], null, true);
}, 100);


/**
 * Changes link url Admin WordPress Logo.
 */
add_filter('login_headerurl', function () {
    return admin_url();
});


/**
 * Changes the Admin WordPress Logo tooltip.
 */
add_filter('login_headertitle', function () {
    // get theme options
    $disable_en_del_af = sage_get_field('disable_en_del_af');
    $update_en_del_af = sage_get_field('update_en_del_af');

    if (!$disable_en_del_af) {
        return 'En del af' . $update_en_del_af;
    }
});


/**
 * Changes Howdy Message.
 */
add_action('admin_bar_menu', function ($wp_admin_bar) {
    $user_id = get_current_user_id();
    $current_user = wp_get_current_user();
    $profile_url = get_edit_profile_url($user_id);

    if (0 != $user_id) {
        $avatar = get_avatar($user_id, 28);
        $howdy = sprintf(__('Hej, %1$s'), $current_user->display_name);
        $class = empty($avatar) ? '' : 'with-avatar';

        $wp_admin_bar->add_menu(array(
            'id' => 'my-account',
            'parent' => 'top-secondary',
            'title' => $howdy . $avatar,
            'href' => $profile_url,
            'meta' => array(
                'class' => $class,
            ),
        ));
    }
}, 11);


/**
 * Changes the Admin WordPress Footer.
 */
add_filter('admin_footer_text', function () {
    $disable_en_del_af = sage_get_field('disable_en_del_af');
    $update_en_del_af = sage_get_field('update_en_del_af');

    if (!$disable_en_del_af) {
        _e('<span id="footer-thankyou">Lavet af ' . $update_en_del_af . '</span>', 'sage');
    }
});


/**
 * Updates version on Admin WordPress Footer.
 */
add_filter('update_footer', function ($version) {
    // get theme options
    $disable_wordpress_version = sage_get_field('disable_wordpress_version');
    if (!$disable_wordpress_version) {
        return 'WordPress ' . $version;
    }
}, 9999);


/**
 * Updates WordPress Dashboard CSS stylesheet.
 */
add_action('admin_head', function () {
    // get theme options
    $enable_wp_dashboard = sage_get_field('enable_wp_dashboard');
    if (!$enable_wp_dashboard) {
        wp_enqueue_style('dashboard_css', asset_path('styles/admin/dashboard.css'));
    }
});

/**
 * Calls all custom dashboard widgets
 */
add_action('wp_dashboard_setup', function () {
    // get theme options
    $disable_controlpanel = sage_get_field('disable_controlpanel');
    $control_panel_title = sage_get_field('control_panel_title');
    $disable_technicalinfo = sage_get_field('disable_technicalinfo');
    $disable_rss = sage_get_field('disable_rss');
    $rss_title = sage_get_field('rss_title');
    $disable_support = sage_get_field('disable_support');

    if (!$disable_controlpanel) {
        if ($control_panel_title) {
            add_meta_box(
                'wp_welcome_dashboard_widget',
                $control_panel_title,
                __NAMESPACE__ . '\\sage_dashboard_widget_function',
                'dashboard',
                'normal',
                'core'
            );
        } else {
            add_meta_box(
                'wp_welcome_dashboard_widget',
                'Welcome to ' . get_bloginfo('name') . ' - Control Panel',
                __NAMESPACE__ . '\\sage_dashboard_widget_function',
                'dashboard',
                'normal',
                'core'
            );
        }
    }

    if (!$disable_technicalinfo) {
        add_meta_box(
            'wp_technical_dashboard_widget',
            __('Technical information', ''),
            __NAMESPACE__ . '\\sage_technical_dashboard_widget_function',
            'dashboard',
            'side',
            'core'
        );
    }

    if (!$disable_rss) {
        if ($rss_title) {
            add_meta_box(
                'wp_rss_dashboard_widget',
                __($rss_title, 'sage'),
                __NAMESPACE__ . '\\sage_rss_dashboard_widget',
                'dashboard',
                'side',
                'core'
            );
        } else {
            add_meta_box(
                'wp_rss_dashboard_widget',
                __('FrisørWeb nyheder', ''),
                __NAMESPACE__ . '\\sage_rss_dashboard_widget',
                'dashboard',
                'side',
                'core'
            );
        }
    }

    if (!$disable_support) {
        add_meta_box(
            'wp_support_widget',
            __('Support', 'sage'),
            __NAMESPACE__ . '\\sage_support_widget_function',
            'dashboard',
            'normal',
            'core'
        );
    }

    add_meta_box(
        'wp_social_dashboard_widget',
        __('Hoeks.dk', ''),
        __NAMESPACE__ . '\\sage_rss_social_widget',
        'dashboard',
        'side',
        'core'
    );
});


/**
 * Disables default Admin WordPress widgets.
 */
add_action('admin_menu', function () {
    // get theme options
    $enable_wp_wordpressnews = sage_get_field('enable_wp_wordpressnews');
    $enable_wp_rightnow = sage_get_field('enable_wp_rightnow');
    $enable_wp_quickdraft = sage_get_field('enable_wp_quickdraft');
    $enable_wp_activity = sage_get_field('enable_wp_activity');

    // removes widgets is selected
    if (!$enable_wp_rightnow) {
        remove_meta_box('dashboard_right_now', 'dashboard', 'core');
    } // Right Now Widget / At a Glance
    if (!$enable_wp_quickdraft) {
        remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
    } // Quick Press Widget / Quick Draft
    if (!$enable_wp_wordpressnews) {
        remove_meta_box('dashboard_primary', 'dashboard', 'core');
    } // WordPress News
    if (!$enable_wp_activity) {
        remove_meta_box('dashboard_activity', 'dashboard', 'core');
    } // Activity


    // Remove Previous versions widgets
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'core'); // Incoming Links Widget
    remove_meta_box('dashboard_plugins', 'dashboard', 'core'); // Plugins Widget
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core'); // Recent Drafts Widget
    remove_meta_box('dashboard_secondary', 'dashboard', 'core'); //

});
remove_action('welcome_panel', 'wp_welcome_panel');


/**
 * Removes metaboxes from Post & Pages
 */
add_action('admin_init', function () {
    /* Removes meta boxes from Posts */
    remove_meta_box('postcustom', 'post', 'normal');
    remove_meta_box('trackbacksdiv', 'post', 'normal');
    remove_meta_box('commentstatusdiv', 'post', 'normal');
    remove_meta_box('commentsdiv', 'post', 'normal');
    remove_meta_box('postcustom', 'page', 'normal');
    remove_meta_box('trackbacksdiv', 'page', 'normal');
    remove_meta_box('revisionsdiv', 'page', 'normal');
    remove_meta_box('commentstatusdiv', 'page', 'normal');
    remove_meta_box('commentsdiv', 'page', 'normal');
});


/**
 * Hides unused menu items
 */
add_action('admin_menu', function () {
    global $menu;

    // get theme options
    $enable_posts_menu = sage_get_field('enable_posts_menu');
    $enable_media_menu = sage_get_field('enable_media_menu');
    $enable_pages_menu = sage_get_field('enable_pages_menu');
    $enable_comments_menu = sage_get_field('enable_comments_menu');
    $enable_appearance_menu = sage_get_field('enable_appearance_menu');
    $enable_plugins_menu = sage_get_field('enable_plugins_menu');
    $enable_users_menu = sage_get_field('enable_users_menu');
    $enable_tools_menu = sage_get_field('enable_tools_menu');
    $enable_settings_menu = sage_get_field('enable_settings_menu');

    $restricted = array();

    if (!$enable_posts_menu) {
        array_push($restricted, __('Posts'));
    }
    if (!$enable_media_menu) {
        array_push($restricted, __('Media'));
    }
    if (!$enable_pages_menu) {
        array_push($restricted, __('Pages'));
    }
    if (!$enable_comments_menu) {
        array_push($restricted, __('Comments'));
    }
    if (!$enable_appearance_menu) {
        array_push($restricted, __('Appearance'));
    }
    if (!$enable_plugins_menu) {
        array_push($restricted, __('Plugins'));
    }
    if (!$enable_users_menu) {
        array_push($restricted, __('Users'));
    }
    if (!$enable_tools_menu) {
        array_push($restricted, __('Tools'));
    }
    if (!$enable_settings_menu) {
        array_push($restricted, __('Settings'));
    }

    end($menu);


    while (prev($menu)) {
        $value = explode(' ', $menu[key($menu)][0]);
        if (in_array($value[0] != null ? $value[0] : "", $restricted)) {
            unset($menu[key($menu)]);
        }
    }
});


/**
 * Removes submenus
 */
add_action('admin_menu', function () {
    global $submenu;
    unset($submenu['index.php'][10]); // Fjerner 'Updates'.
    unset($submenu['themes.php'][5]); // Fjerner 'Themes'.
    unset($submenu['options-general.php'][15]); // Fjerner 'Writing'.
    unset($submenu['options-general.php'][25]); // Fjerner 'Discussion'.
    unset($submenu['edit.php'][16]); // Fjerner 'Tags'.
});


/**
 * Removes Updates submenu
 */
add_action('admin_init', function () {

    // get theme options
    $enable_updates_menu = sage_get_field('enable_updates_menu');

    if (!$enable_updates_menu) {
        remove_submenu_page('index.php', 'update-core.php');
    }
});

/**
 * Inserts a custom Admin WordPress CSS stylesheet.
 */
add_action('admin_head', function () {
    // get theme options
    $disable_icon = sage_get_field('disable_icon');
    $update_icon = sage_get_field('update_icon');

    if (!$disable_icon) {
        wp_enqueue_style('admin_icon_css', asset_path('styles/admin/icons.css'));

        if ($update_icon) {
            $upload_icon = sage_get_field('upload_icon');

            if ($upload_icon) {
                ?>
                <style type="text/css">
                    #wpadminbar #wp-admin-bar-wp-logo > .ab-item {
                        background: url(<?php _e($upload_icon) ?>) 10px 0 no-repeat !important;
                        background-size: contain !important;
                    }
                </style>
                <?php
            }
        }
    } else {
        wp_dequeue_style('admin_icon_css', asset_path('styles/admin/icons.css'));
    }
});


/**
 * Changes the Admin Toolbar
 */
add_action('admin_bar_menu', function ($wp_admin_bar) {
    // get theme options
    $enable_about_menu = sage_get_field('enable_about_menu');
    $enable_wordpress_menu = sage_get_field('enable_wordpress_menu');
    $enable_doc_menu = sage_get_field('enable_doc_menu');
    $enable_forums_menu = sage_get_field('enable_forums_menu');
    $enable_feedback_menu = sage_get_field('enable_feedback_menu');
    $enable_site_menu = sage_get_field('enable_site_menu');
    $enable_top_comments_menu = sage_get_field('enable_top_comments_menu');
    $enable_new_menu = sage_get_field('enable_new_menu');
    $enable_updates_menu = sage_get_field('enable_updates_menu');

    // disable admin toolbar options at init
    //$wp_admin_bar->remove_node('wp-logo');

    if (!$enable_about_menu) {
        $wp_admin_bar->remove_menu('about');
    } // Remove the about WordPress link
    if (!$enable_wordpress_menu) {
        $wp_admin_bar->remove_menu('wporg');
    } // Remove the WordPress.org link
    if (!$enable_doc_menu) {
        $wp_admin_bar->remove_menu('documentation');
    } // Remove the WordPress documentation link
    if (!$enable_forums_menu) {
        $wp_admin_bar->remove_menu('support-forums');
    } // Remove the support forums link
    if (!$enable_feedback_menu) {
        $wp_admin_bar->remove_menu('feedback');
    } // Remove the feedback link
    if (!$enable_top_comments_menu) {
        $wp_admin_bar->remove_node('comments');
    }
    if (!$enable_site_menu) {
        $wp_admin_bar->remove_node('site-name');
    }
    if (!$enable_new_menu) {
        $wp_admin_bar->remove_node('new-content');
    }
    if (!$enable_updates_menu) {
        $wp_admin_bar->remove_node('updates');
    }
}, 999);


/**
 * Update Admin Favicon
 */
add_action('admin_head', function () {
    // get theme options
    $update_favicon = sage_get_field('update_favicon');
    $upload_favicon = sage_get_field('upload_favicon');
    $favicon = asset_path('images/icons/favicon.ico');

    $favicon_url = (!$update_favicon) ?
        $favicon : (($upload_favicon) ? $upload_favicon : $favicon);
    _e('<link rel="shortcut icon" href="' . $favicon_url . '" />');
});
add_action('login_head', function () {
    // get theme options
    $update_favicon = sage_get_field('update_favicon');
    $upload_favicon = sage_get_field('upload_favicon');
    $favicon = asset_path('images/icons/favicon.ico');

    $favicon_url = (!$update_favicon) ?
        $favicon : (($upload_favicon) ? $upload_favicon : $favicon);
    _e('<link rel="shortcut icon" href="' . $favicon_url . '" />');
});
