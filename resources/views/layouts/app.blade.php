<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <link rel="shortcut icon" href="/img/favicon/favicon.ico">


    <meta name="theme-color" content="#ffffff">

    <title>@yield('title')</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div>
    @include('blocks.navbar.index')

    <main class="py-4">
        @yield('content')
    </main>
    @include('blocks.footer.index')
</div>
<script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
