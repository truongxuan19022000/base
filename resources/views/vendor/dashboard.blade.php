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
    @include('vendor.layout.header')
    <div class="main main--mypage">
        @include('vendor.layout.sidebar')
        <div class="wrap">
            <div class="backSp">
                <button class="btn"><img src="{{URL::asset('assets/vendor/images/common/icon-back.svg')}}" alt=""></button>
                {{trans('vendor/common.header.img')}}
            </div>
            <div class="comlum">
                @include('vendor.layout.menu')
                <div class="comlum-content">
                    @include('vendor.user.content')
                </div>
            </div>
        </div>

    </div>
    <!--/main -->
    @include('vendor.layout.footer')
</div>
</body>
</html>
