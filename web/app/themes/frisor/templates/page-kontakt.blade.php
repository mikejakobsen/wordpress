<?php
/*
Template Name: Kontakt
*/
?>

@extends('layouts.base')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @include('partials.content-single-maps')
    @include('partials.content-single-instagram')
  @endwhile
@endsection

