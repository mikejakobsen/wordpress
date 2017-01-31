<?php

global $post;


var_dump($member_ids);

if ( ! function_exists( 'find_medarbejder' ) ) :
/**
 * Display team members
 *
 * @param  array $member_ids
 */
function find_medarbejder( $member_ids ) {
  if ( empty( $member_ids ) ) { return; }
    $member_ids = unserialize( $member_ids );

    $member_query = new WP_Query( array(
      'posts_per_page' => 2,
      'orderby' => 'menu_order',
      'order' => 'ASC',
      'post_type' => 'medarbejder',
      'post__in' => $member_ids ) );
  ?>
  <div class="about-members">
    <?php while ( $member_query->have_posts() ) : $member_query->the_post(); ?>

    <?php endwhile; wp_reset_postdata(); ?>
  </div>
<?php
}
endif;

