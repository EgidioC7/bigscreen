<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ID=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BigScreen</title>
    <link href="{{asset("css/app.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</div>
@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        <?php if(Session::has('success')) : ?>
            $('#myModal').modal('show');
        <?php endif; ?>
    </script>
@show
</body>
</html>