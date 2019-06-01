<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web:900|Roboto+Slab:300,600&display=swap" rel="stylesheet">
        @yield('head')

    </head>
    <body class="font-body text-black font-light">
        @include('_layouts.partials.navbar')
        @yield('body')
        @include('_layouts.partials.footer')

        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
    </body>
</html>
