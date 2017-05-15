<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staggler</title>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700|Merriweather:400italic,400' rel='stylesheet' type='text/css'>
     <!-- Resource style -->
     <link rel="stylesheet" href="{{asset('css/font.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    
    @yield('css_styles')

      
    </head>
    <body>
    @include('include.header')
            
    @yield('content')
         @yield('js')
    
    

   
    @include('include.footer')
        </body>

</html>