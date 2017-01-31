<article @php post_class() @endphp>
    <header>
        <h1 class="brands__heading">{{ get_the_title() }}</h1>
    </header>
    <div class="brands">
      <div class="row-eq-height brands__row">
      <?php if( have_rows('brands') ): ?>

        <?php while( have_rows('brands') ): the_row(); ?>
        <div class="col-xs-12 col-md-4 brands__item">

          <h3 class="brands__name"><?php the_sub_field('brand__navn'); ?></h3>

          <img class="brands__image" src="<?php the_sub_field('brand__billede'); ?>" alt="" />

          <p class="brands__description"><?php the_sub_field('brand__beskrivelse'); ?></p>


        </div>
        <?php endwhile; ?>

      <?php endif; ?>
      </div>
    </div>
    <footer>
        {!! wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
    </footer>
</article>
