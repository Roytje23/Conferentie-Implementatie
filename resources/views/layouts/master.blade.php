<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
 
        <tite>@yield('title')</tite>
        <link rel="stylesheet" href="{{ URL::secure('src/css/main.css') }}" />
        <script src="{{ URL::secure('src/jquery/jquery-3.1.1.min.js') }}"></script>
        @yield('styles')
        
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Conferentie Website</title>
    <!-- Bootstrap -->
    <link href="src/css/bootstrap.min.css" rel="stylesheet"
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
     </head>
    
    <body>
        @include('includes.header')
        
        <div class="main">
            @yield('content')
        </div>
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="src/js/bootstrap.min.js"></script>
    
    </body>
</html>