<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css' )}}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>{{ env('APP_NAME') }} - Adminpanel</title>
</head>
<body class="bg-dark">

<div class="container-fluid">
    <div class="row admin">
        <div class="col-md-3">
            @include('inc.admin.sidebar')
        </div>
        <div class="col-md-9">
            @include('inc.admin.navbar')
            @yield('content')
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
