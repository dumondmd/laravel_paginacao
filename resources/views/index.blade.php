<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Paginação</title>
        <!-- Styles -->        
         <link rel="stylesheet" type="text/css" href="{{asset('site/style.css')}}">        
    </head>
    <body>
        <div class="container">
            
        </div>
        <script src="{{asset('site/jquery.js')}}" type="text/javascript"></script>
        <script src="{{asset('site/bootstrap.js')}}" type="text/javascript"></script>
    </body>
</html>
