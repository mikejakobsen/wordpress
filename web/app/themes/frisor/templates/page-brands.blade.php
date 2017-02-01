@extends('layouts.base')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @include('partials.content-page')
    <?php

      $posts = get_posts(array(
        'numberposts'	=> -1,
        'post_type'		=> 'brands'
      ));
    ?>
      <?php if( $posts->have_posts() ): ?>
      <ul>
      <?php while( $posts->have_posts() ) : $posts->the_post(); ?>
        <li>
          </a>
        </li>
        <?php endwhile; ?>
      </ul>
      <?php endif; ?>

      <?php wp_reset_query(); ?>
  @endwhile
@endsection
