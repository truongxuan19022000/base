<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="{{asset('/assets/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="{{asset('/assets/admin/css/layout.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/admin/css/sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/admin/css/perfect-scrollbar.css')}}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="{{asset('/assets/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('/assets/admin/js/script.js')}}"></script>
    <script src="{{asset('/assets/admin/js/sidebar.js')}}"></script>
    <script src="{{asset('/assets/admin/js/common.js')}}"></script>
    <script src="{{asset('/assets/admin/js/svg.js')}}"></script>
    <script src="{{asset('/assets/admin/js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('/assets/admin/js/popper.min.js')}}"></script>
    <script src="{{asset('/assets/admin/js/perfect-scrollbar.min.js')}}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    @stack('custom-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title id="metaTitle">{{ trans($meta['title']) }}</title>
</head>

<body>
    <div class="wrapper">
        @include('admin.layout.sidebar')
        <div class="layout-content">
            @include('admin.layout.header')
            {{ AppUtils::showMessage() }}
            <div class="content">
                <div class="container-fluid">
                    <div class="main-content pd3">
                        @yield('contents')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stack('min-script')
</body>

</html>