<!doctype html>
<html>
    <head>
        @include('includes.header')
    </head>
<body>
<div class="container">
    <!-- Header -->
    <header class="row">
        @include('includes.menu')
    </header>
    
    <!-- Content -->
    <div id="main" class="row">
        <div class="container">
            @yield('content')
        </div>
    </div>

</div>

<!-- Footer -->
    @include('includes.footer')

    <script src="/assets/jquery.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>