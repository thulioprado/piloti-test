<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css' )}}">

    <style>
        .big {
            font-size: 80px;
        }

        .box {
            padding: 100px;
        }
    </style>
</head>
<body>
    <div class="container is-allcentered">
        <div class="box has-text-centered">
            <span class="big">
                404
            </span>
            <hr>
            Página não encontrada
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>