<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('bootstrap-5/css/bootstrap.min.css')}}">
<script src="{{asset('jquery-3.6.0.min.js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('bootstrap-5/js/bootstrap.min.js')}}"></script>
    <style>
        body{
            margin:0;
            padding:0;
        }
        .in-valid{
            border:1px solid red;
        }
    </style>
</head>
<body>
<!-- header -->
    @include('master.header')
<!-- end header -->

    @yield('content')


<!-- footer -->
    @include('master.footer')
<!-- end footer -->
<!-- jquery -->
    @yield('script')
</body>
</html>