<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Statistics</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.0.0-beta.4/dist/css/bootstrap-material-design.min.css" integrity="sha384-R80DC0KVBO4GSTw+wZ5x2zn2pu4POSErBkf8/fSFhPXHxvHJydT0CSgAP2Yo2r4I" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

<main>
    <h1>Статистика по популярности брендов ({{ count($brands) }})</h1>
    <canvas id="basketStatistics"
        data-statistics="{{ json_encode($statistics) }}"
        data-brands="{{ json_encode($brands) }}">
    </canvas>
</main>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
