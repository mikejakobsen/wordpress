# FrisørWeb

## Getting started

<!-- Activate all Plugins -->
wp plugin activate --all
<!-- Delete all posts -->
wp post delete $(wp post list --post_type='post' --format=ids) &&
<!-- Delete all pages -->
wp post delete $(wp post list --post_type='page' --format=ids) &&
<!-- Set WP options -->
wp option set default_comment_status closed; &&
<!-- Create default pages -->
wp post create --post_type=page --post_status=publish --post_title='Forsiden' &&
wp option update page_on_front 5 &&
wp post create --post_type=page --post_status=publish --post_title='Personale' &&
wp post create --post_type=page --post_status=publish --post_title='Kontakt' &&
wp option update permalink_structure ""


## Theme settings
Theme settings is defined at `src/theme-settings.php`. It's included in the App namespace - and creates the `Udseende` sidebar options, and appends some inline style to the theme, to make the user able to choose text-color, link-color, and the global typography.

## FrisørWeb settings

The global FrisørWeb settings is defined in `src/admin.php`

## Customer information

All the relevant information regarding the customer is defined in `src/theme-options.php`

#Todo
$name
$street
$nr
$postnr
$city
$phone

$openinghours table
