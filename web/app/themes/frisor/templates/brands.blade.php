@php
  /**
   * Template Name: Brands
   */
 @endphp


 @extends('layouts.base')

 @section('content')
   @include('partials.page-header')

  @if( ! empty($get_field['brands']))
   <ul>
     @foreach ($brands as $brand)
       <li>
         <a href="<?php echo $brand['url']; ?>">
           <img src="<?php echo $brand['sizes']['thumbnail']; ?>"
                alt="<?php echo $brand['alt']; ?>" />
         </a>
         <p><?php echo $brand['caption']; ?></p>
       </li>
     @endforeach
   </ul>
 @endif
@endsection
