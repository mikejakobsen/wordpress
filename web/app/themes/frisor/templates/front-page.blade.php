@extends('layouts.base')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @include('partials.content-page')
    <h1>Forside template</h1>
  @endwhile
@endsection
