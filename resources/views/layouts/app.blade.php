<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CiTube ') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};

        window.citube = {
            url: '{{config('app.url')}}',
            user: {
                id: {{Auth::check() ? Auth::user()->id : 'null'}},
                authenticated: {{Auth::check() ? 'true': 'false'}}
            }
        };
    </script>
</head>
<body>
    <div id="app">
        @include('layouts.partials._navigation')

        @yield('content')

        @include('layouts.partials._footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
