<article @php post_class() @endphp>
  <?php
    $post_objects = get_field('brands');

  if( $post_objects ): ?>

  <div class="brands">
      @foreach( $post_objects as $post_object)
        @php
          $brands = get_field('brand__name', $post_object->ID);
          if ( $brands )
            var_dump($brands);
            echo '<table class="prisliste__table table table-striped">';
            if ( $brands['brands__name'] ) {
              echo '<thead class="prisliste__heading">';
              echo '<tr>';
              foreach ( $brands['brand__image'] as $th ) {
                echo '<th>';
                echo $th['c'];
                echo '</th>';
              }
              echo '</tr>';
              echo '</thead>';
            }
        @endphp
      @endforeach
  <?php endif; ?>

  <footer>
  {!! wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  </article>
  <?php wp_reset_postdata() ?>
