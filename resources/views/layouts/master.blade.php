<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BigScreen') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/custom.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        @include('partials.menu')
        <main class="py-5">
            <div class="container">
                <div class="card border-0 shadow my-5">
                    <div class="card-body p-5">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        @section('scripts')
        <script src="{{asset('js/app.js')}}"></script>
        <script>
        <?php if (Session::has('success')): ?>
        $('#myModal').modal('show');
        <?php endif; ?>
        </script>
        @show
    </body>

</html>