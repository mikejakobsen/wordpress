<article @php post_class() @endphp>
  <?php

    $post_objects = get_field('medarbejdere');
    if( $post_objects ): ?>
    <div class="employees">
      @foreach( $post_objects as $post_object)
        <?php setup_postdata( $post_object ); ?>
        <?php $job = get_field('employee__job', $post_object->ID); ?>
        <?php $image = get_field('employeepost__photo', $post_object->ID); ?>
          <p><?php the_title(); ?></p>
      <div class="employee__row row-eq-height">
        <div class="employee__item col-xs-12 col-md-4 col-lg-3">
          <h3 class="employee__job text-center">{{ $job }}</h3>
          <img class="employee__image img-reponsive" src="{{ $image['url'] }}"
          alt="{{ $image['alt'] }}" title="{{ $image['title'] }}"/>
        </div>
      </div>
      @endforeach
    @endif
    <footer>
    {!! wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
<?php wp_reset_postdata() ?>
