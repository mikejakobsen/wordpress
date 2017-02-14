<?php
function maps_api( $api ){

  $api['key'] = 'AIzaSyC2poW8VMP3nZRRKXF1-Ndm2A7DegLiSts';

  return $api;

}

add_filter('acf/fields/google_map/api', 'maps_api');
?>
// <?php
// function my_acf_init() {
//
// 	acf_update_setting('google_api_key', 'AIzaSyC2poW8VMP3nZRRKXF1-Ndm2A7DegLiSts');
// }
//
// add_action('acf/init', 'my_acf_init');
// ?>
