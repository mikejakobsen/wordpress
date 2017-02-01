<?php
/**
 * Create the Page meta boxes
 */
global $post;

if ( ! function_exists( 'list_team_member' ) ) :
function list_team_member() {
  global $post;

  $template_file = '';

  if ( ! empty( $_GET['post'] ) || ! empty( $_POST['post_ID'] ) ) {
    $template_file = get_post_meta( $post->ID, '_wp_page_template', TRUE );
  }

  $team_members = get_posts( array(
    'post_type' => 'medarbejdere',
    'posts_per_page' => -1,
    'post_status' => 'publish'
  ) );
  $members      = array();

  foreach ( $team_members as $member ) {
    $members[ $member->ID ]  = $member->post_title;
    var_dump($member->post_title);
  }
}
endif;
add_action( 'add_meta_boxes', 'list_team_member' );
