<?php
/*
Template Name: Brands
*/
?>

@extends('layouts.base')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content-page')
    @include('partials/content-single-brands')
  @endwhile
@endsection

