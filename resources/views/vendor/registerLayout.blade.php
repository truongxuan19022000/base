<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="format-detection" content="telephone=no">
    <title>KAERUN</title>
    <!-- CSS -->
    <link href="{{URL::asset('assets/vendor/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet" media="all">
    <link href="{{URL::asset('assets/vendor/css/styles.css')}}" type="text/css" rel="stylesheet" media="all">
    <!-- JS -->
    <script type="text/javascript" src="{{URL::asset('assets/vendor/js/jquery-1.9.1.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/vendor/js/popper.min.j')}}s"></script>
    <script type="text/javascript" src="{{URL::asset('assets/vendor/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/vendor/js/svg.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/vendor/js/common.js')}}"></script>
</head>

<body>
<div class="wrapper">
    @include('vendor.layout.header_register')
    <div class="main main--register">
        <div class="wrap-800">
            @yield('contents')
        </div>
    </div>
    <!--/main -->
    @include('vendor.layout.footer')
</div>
</body>
</html>
