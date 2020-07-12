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
        <title>Рассказы хомячка</title>
        <!-- Styles -->
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        @yield('styles')
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                @auth
                    <a href="{{ route('index') }}">Home</a>
                    <a href="{{ route('logout') }}">Logout</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endauth
                    <a href="{{ route('recipe.index') }}">Список</a>
                    <a href="{{ route('recipe.show', 1) }}">Просмотр</a>
                    <a href="{{ route('recipe.create') }}">Создание</a>
                    <a href="{{ route('recipe.edit', 1) }}">Редактирование</a>
            </div>
            <div class="content">
                @yield('content')
            </div>
        </div>
        <script src="{{ mix('/js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
