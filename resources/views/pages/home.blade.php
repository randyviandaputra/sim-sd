<!doctype html>
<html>
    <head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        @include('includes.header')
<<<<<<< Updated upstream
=======
        <style type="text/css">
            .navbar-inverse{
            background-color: #003566;
            border: none;
            border-radius: 0px;
            }

        .popover-title{
            background:  #f44336;
        }
        .popover-header{ 
            background:  #f44336; 
        } 
        .popover-content{
         background:  #f44336;
         color:white; 
         border-collapse: collapse;
        }
        </style>
>>>>>>> Stashed changes
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