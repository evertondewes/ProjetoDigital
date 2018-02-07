<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Projeto Digital | @yield ('title')</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    @include ('layouts.nav')

    <div class="container">
        @yield ('content')
    </div>

    @section ('scripts')
        <script src="/js/app.js"></script>
    @show
</body>
</html>
