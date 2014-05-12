<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title', 'Admin')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="{{ URL::asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('backend/css/admin.css') }}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>

        <script src="{{ URL::asset('backend/js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('backend/js/bootstrap.min.js') }}"></script> 

    </body>
</html>