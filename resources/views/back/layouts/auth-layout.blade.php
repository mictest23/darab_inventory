<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('pageTitle')</title>
    <livewire:styles />
  </head>
  <body class="bg-gray-100">
    
    @yield('content')
    
    <livewire:scripts />
  </body>
</html>
