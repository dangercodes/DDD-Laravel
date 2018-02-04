<html>
    <head>
        @include('Layout.common.Head')
    </head>
    <body>

        @include('Layout.main.header')
       
        <div class="container-fluid" style="margin-top:70px;">
            @yield('content')
        </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
           
            @yield('javascript-library')
    </body>
</html>
