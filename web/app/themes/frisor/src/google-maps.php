<?php
function maps_api( $api ){

  $api['key'] = 'AIzaSyC2poW8VMP3nZRRKXF1-Ndm2A7DegLiSts';

  return $api;

}

add_filter('acf/fields/google_map/api', 'maps_api');
?>
