@php
    /**
     * Template Name: Personale
     */
     global $post;
@endphp

@extends('layouts.base')

@section('content')
    @while(have_posts()) @php the_post() @endphp
      @include('partials.medarbejdere')
    @endwhile
@endsection
