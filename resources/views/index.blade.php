<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Vive Euskadi | Home</title>
</head>

<body>
    <div id="app">
        <main class="flex-row" id="contentIndex">

            {{-- Cabecera --}}
            @if (Route::has('login') && Route::has('register'))
            @auth
            <cabecera descubre-euskadi="{{ url('descubre-euskadi')}}" index-route="{{ url('/home')}}" user-route="{{ route('user.miPerfil', Auth::user()->id) }}" user-name="<?php echo Auth::user()->name; ?>" log-out="{{route('logout')}}" user-Admin="<?php echo Auth::user()->admin ?>" admin-route="{{url('admin/gestion-usuarios')}}"></cabecera>
            @else
            <cabecera descubre-euskadi="{{ url('descubre-euskadi')}}" index-route="{{ url('/home')}}" user-login="{{ route('login') }}" user-register="{{ route('register') }}"></cabecera>
            @endauth
            @endif


            {{-- Vídeo --}}
            <section class="videoWrapper" id="videoIndex">
                <video playsinline autoplay muted loop>
                    <source src="{{ URL::asset('videos/visitEuskadi.mp4') }}" type="video/mp4">
                </video>
            </section>
            {{-- Contenido del index --}}
            <section class="row bg-image pt-5 pb-5" id="contenidoPrincipalIndex">
                {{-- Barra de búsqueda --}}
                <barra-busqueda request-busqueda="{{ request()->get('textoBusqueda') }}"></barra-busqueda>
                {{-- Complemento --}}
                <index-comp></index-comp>
            </section>
            {{-- Pie de página --}}
            <piepagina></piepagina>
        </main>
    </div>
    {{-- Script --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>