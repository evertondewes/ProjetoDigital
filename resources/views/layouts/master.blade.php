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
    <main id="app">
        <div id="sidebar">
            @section ('sidebar')
                @include ('layouts.sidebar')
            @show
        </div>

        <div id="content">
            @include ('layouts.nav')

            <div class="container">
                @yield ('content')
            </div>
        </div>
    </main>

    @section ('scripts')
        <script>
            window.old = JSON.parse('{!! htmlspecialchars(json_encode(old()), ENT_NOQUOTES) !!}');
            window.appCity = '{{ env('CITY') }}';
        </script>

        <script src="/js/app.js"></script>
    @show
</body>
</html>
