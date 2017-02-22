<article @php post_class() @endphp>
  <?php

    $post_objects = get_field('brands');
  if( $post_objects ): ?>
  <div class="brands">
    @foreach( $post_objects as $post_object)
      <?php $logo = get_field('brand__image', $post_object->ID); ?>
      <?php $description = get_field('brand__description', $post_object->ID); ?>
      <div class="brand__item">
        <h3 class="brand__name">{{$post_object->post_title}}</h3>
        <img class="brand__image" src="{{ $logo }}" />
        <p class="brand__description">{{ $description }}</p>
      </div>
    @endforeach
  @endif
  </div>
  <footer>
    {!! wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
<?php wp_reset_postdata() ?>
