<!doctype html>
<html>
    <head>
        @include('includes.header')
        <style type="text/css">
            .navbar-inverse{
            background-color: #003566;
            border: none;
            border-radius: 0px;
            }
        </style>
    </head>
<body>
    <!-- Header -->
     @if(Auth::check())
        @include('includes.menu')
     @endif
    <!-- Content -->
    <div id="main" class="row">
        <div class="container">
            @yield('content')
        </div>
    </div>
<!-- Footer -->
 @if(Auth::check())
    @include('includes.footer')
@endif
    <script src="/assets/jquery.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
@yield('javascript')
</body>
</html>