<?php
/*
Template Name: Medarbejdere
*/
?>

@extends('layouts.base')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content-page')
    {{-- @include('partials/content-single-medarbejdere') --}}
    @include('partials/content-single-person')
  @endwhile
@endsection

