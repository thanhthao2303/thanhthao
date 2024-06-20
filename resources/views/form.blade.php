<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Website cửa hàng sách Fahasa</title>
        @vite('resources/css/app.css')
    </head>
    <body >
        <header>
            <h1>Header</h1>
        </header>
        @yield('content')
        <footer>
            <h1>Footer</h1>
        </footer>
    </body>
</html>