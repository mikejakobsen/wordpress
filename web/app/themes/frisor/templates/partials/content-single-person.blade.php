<?php
  $args = array(
    'post_type' => 'person',
    'post_status' => 'publish',
    'posts_per_page' => '10'
  );
$products_loop = new WP_Query( $args );
if ( $products_loop->have_posts() ) :
  while ( $products_loop->have_posts() ) : $products_loop->the_post();
// Set variables

      ?>
      <div class=”product”>

      </div>
      <?php
        endwhile;
wp_reset_postdata();
endif;

