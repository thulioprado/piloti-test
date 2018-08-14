<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css' )}}">
</head>
<body>
    <div id="content" class="container is-fullhd">
        @if (Auth::check())
        @else
            @include('login')
        @endif

        @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>