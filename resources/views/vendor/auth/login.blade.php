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
@include('vendor.layout.header_register')
<div class="main main--boxGray main--login">
    <div class="login">
        <div class="boxLogin">
            <h1 class="login-title text-center">
                {{trans('vendor/common.login.title')}}
               </h1>
            <p class="login-note">
                {{trans('vendor/common.register.title')}}
            </p>
            <form method="POST" action="{{ route('vendor.login') }}">
                @csrf
            <div class="formLogin">
                <label class="formLogin-label" for="email">{{trans('vendor/common.form.email')}}</label>
                <div class="formLogin-control">
                    <input class="form-control" type="email" placeholder="例）sample@example.com" id="email" name="email">
                </div>
            </div>
            <div class="formLogin">
                <label class="formLogin-label" for="pwd">{{trans('vendor/common.form.password')}}</label>
                <div class="formLogin-control">
                    <input class="form-control" type="password" placeholder="パスワードを入力" id="pwd" name="password">
                </div>
            </div>
            <div class="formLogin-btn">
                <button type="submit" class="btn btn-primary btn-lg w-100">{{trans('vendor/common.form.submit')}}</button>
            </div>
            <p class="forgotten text-center"><a href="#">{{trans('vendor/common.form.forgot')}}</a></p>
            <div class="haveNot">
                <p class="haveNot-txt">{{trans('vendor/common.register.title')}}</p>
                <a href="{{ url('vendor/register') }}"><button type="button" class="btn btn-outline-dark btn-lg btn-fs15 w-100">{{trans('vendor/common.register.button')}}</button></a>
            </div>
        </div>
    </div>
</div><!--/main -->
@include('vendor.layout.footer')
</body>

</html>
