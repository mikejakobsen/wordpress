<article @php post_class() @endphp>
  <?php

    $post_objects = get_field('brands');
  if( $post_objects ): ?>
  <div class="brands">
    @foreach( $post_objects as $post_object)
      <?php $brands = get_field('brand__name', $post_object->ID); ?>
      <?php $logo = get_field('brand__image', $post_object->ID); ?>
      <div class="brands__row row-eq-height">
        <div class="brand__item col-xs-12 col-md-4 col-lg-3">
          <h3 class="brand__name text-center">{{ $brands }}</h3>
          <img class="brand__image img-reponsive" src="{{ $logo }}" />
        </div>
      </div>
      @endforeach
    @endif
    <footer>
    {!! wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
<?php wp_reset_postdata() ?>
