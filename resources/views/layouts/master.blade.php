<!DOCTYPE html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="meta description">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <!-- Site title -->
      <title> @yield('title') </title>
      
      @include('partials._stylesheets')
      
      @yield('stylesheets')

   </head>

   <body>

      @yield('content')

      @include('partials._scripts')

      @yield('scripts')

   </body>
</html>