<!doctype html>
<html>
    <head>
        @include('layouts.meta')
    </head>
    <body>
        <div class="banner">
            @include('layouts.banner')
        </div>

        <div class="container">
            @yield('content')
        </div>

        <div class="footer">
            @include('layouts.footer')
        </div>
    </body>
</html>
