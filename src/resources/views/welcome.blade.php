<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Statistics</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
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
