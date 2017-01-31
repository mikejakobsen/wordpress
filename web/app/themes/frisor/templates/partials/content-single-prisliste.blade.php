<article @php post_class() @endphp>
    <header>
        <h1 class="prisliste__overskrift">{{ get_the_title() }}</h1>
    </header>
    <div class="prisliste">
          @php
          $table = get_field( 'prisliste' );

          if ( $table ) {

              echo '<table class="prisliste__table table">';

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
    </div>
    <footer>
        {!! wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
    </footer>
</article>
