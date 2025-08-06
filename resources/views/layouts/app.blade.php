<!doctype html>
<html>
<title>Deportes Asis</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="lenguage" content="es">
<meta name="description" content="Deportes Asis, Comercializacion de Articulos Deportivos">
<meta name="keywords" content="articulos deportivos, poleras, camisetas, yoga, mancuernas, pelotas, estampados, balones, futbol, basquetbol">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/estilos_falcon2.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/funciones.js')}}"></script>
<script src="{{ asset('js/funcionesJs3.js')}}"></script>
<script src="{{ asset('js/fnRotativos.js')}}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



</head>
<body>
   @include('partials.header')
   @yield('content')
   @include('partials.footer')
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   <script src="{{ asset('js/app.js') }}"></script>
   <script src="{{ asset('js/jquery.js') }}"></script>
</body>
</html>