<?php
namespace App;

/**
 * Updates the field with the parameter
 *
 * @param string $fieldName Field Name.
 * @param mixed $param Params.
 */
function sage_update_field($fieldName, $param)
{
    if (function_exists('get_field')) {
        $value = get_field($fieldName, 'option');

        if (is_null($value) || empty($value)) {
            update_field($fieldName, $param, 'option');
        }
    }
}

/**
 * Get field value or return FALSE if fails.
 *
 * @param string $fieldName Field Name.
 * @return mixed
 */
function sage_get_field($fieldName)
{
    if (function_exists('get_field')) {
        $value = get_field($fieldName, 'option');

        if (is_null($value) || empty($value)) {
            return false;
        }

        return $value;
    }

    return false;
}

/**
 * Adds a widget in WordPress Dashboard.
 */
function sage_technical_dashboard_widget_function()
{
    // get theme options
    $releaseDate = sage_get_field('release_date');
    $latestDate = sage_get_field('latest_date');
    $themeName = sage_get_field('theme_name');
    $themeVersion = sage_get_field('theme_version');

    // Entering the text between the quotes
    ?>
    <ul>
        <li><strong>Oprettet</strong>: <?php _e($releaseDate); ?></li>
        <li><strong>Opdateret</strong>: <?php _e($latestDate); ?></li>
        <li><strong>Tema</strong>: <?php _e($themeName); ?></li>
        <li><strong>Version</strong>: <?php _e($themeVersion); ?></li>
    </ul>
    <?php
}

/**
 * Inserts RSS Dashboard Widget.
 */
function sage_rss_dashboard_widget()
{
    // get theme options
    $rssFeed = sage_get_field('rss_feed');

    if ($rssFeed) {
        if (function_exists('fetch_feed')) {
            include_once(ABSPATH . WPINC . '/feed.php'); // include the required file
            $feed = fetch_feed($rssFeed); // specify the source feed
            $limit = 0;

            if (!is_wp_error($feed)) {
                $limit = $feed->get_item_quantity(7); // specify number of items
                $items = $feed->get_items(0, $limit); // create an array of items
            }
        }
        if ($limit == 0) {
            echo '<div>Frisørweb feedet blev ikke fundet.</div>'; // fallback message
            return;
        }

        foreach ($items as $item) {
            ?>

            <h4 style="margin-bottom: 0;">
                <a href="<?php echo $item->get_permalink(); ?>"
                   title="<?php echo mysql2date(__('j F Y @ g:i a', ''), $item->get_date('Y-m-d H:i:s')); ?>"
                   target="_blank">
                    <?php echo $item->get_title(); ?>
                </a>
            </h4>
            <p style="margin-top: 0.5em;">
                <?php echo substr($item->get_description(), 0, 200); ?>
            </p>
            <?php
        }
    }
}

/**
 * Add Social Tabs Widget
 */
function sage_rss_social_widget()
{
    $facebookFeed = sage_get_field('fb_widget_code');
    /**
     * Display tabs only if proper code has been set into admin options
     * Høks.dk Facebook Feed
     */

    ob_start();
    ?>
    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <?php if (!empty($facebookFeed)) : ?>
                <li role="presentation" class=" nav-item active">
                </li>
            <?php endif; ?>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <?php if (!empty($facebookFeed)) : ?>

                <div role="tabpanel" class="tab-pane active" id="facebook">
                    <div id="fb-root"></div>
                    <script>(function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1012977898732553";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                    <?= $facebookFeed ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    echo $output;
}


/**
 * Inserts Support Dashboard Widget.
 */
function sage_support_widget_function()
{
    // get theme options
    $supportLogo = sage_get_field('support_logo');
    $supportUrl = sage_get_field('support_url');
    $supportMessage = sage_get_field('support_message');

    $printLogo = ($supportLogo) ? $supportLogo : asset_path('images/admin/logo-white.png');

    ?>
    <div>
        <a href="<?php _e($supportUrl); ?>" target="_blank" class="wp_support_widget_logo">
            <img src="<?php _e($printLogo); ?>" alt="Høks support" height="70">
        </a>
        <?php _e($supportMessage); ?>
    </div>
    <div class="clear"></div>
    <?php
}

/**
 * Inserts Welcome Dashboard Widget.
 */
function sage_dashboard_widget_function()
{
    //get theme options
    $disableLogo = sage_get_field('disable_logo');
    $updateLogo = sage_get_field('update_logo');
    $uploadLogo = sage_get_field('upload_logo');
    $controlPanelMessage = sage_get_field('control_panel_message');
    $adminLogo = asset_path('images/admin/logo-white.png');
    $printLogo = ($disableLogo) ?
        get_admin_url() . '/images/wordpress-logo.png' :
        (($updateLogo) ? (($uploadLogo) ? $uploadLogo : $adminLogo) : $adminLogo);
    $logoHeight = ($disableLogo) ? '63' : '75';

    // Entering the text between the quotes
    ?>
    <div class="admin-logo"><img src="<?php _e($printLogo); ?>" alt="<?php _e(get_bloginfo('name')); ?>"
                                 height="<?php _e($logoHeight); ?>"/></div>

    <?php
    if ($controlPanelMessage) :
        _e($controlPanelMessage);
        return;
    endif;
    ?>
    <p>Velkommen til din nye FrisørWeb hjemmeside</p>
    <p>Her finder du alle relevante indstilligner i forhold til opsætningen af din FrisørWeb hjemmeside. <br/>Du finder alle indstilligner i menuen til venstre.
    </p>
    <div class="clear"></div>
    <?php
}
