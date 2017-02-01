<article @php post_class() @endphp>
  <div class="prisliste">
    <?php
      $post_objects = get_field('prislister');

    if( $post_objects ): ?>
      @foreach( $post_objects as $post_object)
        @php
          $table = get_field('prisliste', $post_object->ID);
          if ( $table ) {
            echo '<table class="prisliste__table table table-striped">';
            if ( $table['header'] ) {
              echo '<thead class="prisliste__heading">';
              echo '<tr>';
              foreach ( $table['header'] as $th ) {
                echo '<th>';
                echo $th['c'];
                echo '</th>';
              }
              echo '</tr>';
              echo '</thead>';
            }
            echo '<tbody>';
            foreach ( $table['body'] as $tr ) {
              echo '<tr>';
              foreach ( $tr as $td ) {
                echo '<td>';
                echo $td['c'];
                echo '</td>';
              }
              echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
          }
        @endphp
      @endforeach
    <?php endif; ?>
  </div>
  <footer>
    {!! wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
<?php wp_reset_postdata() ?>
