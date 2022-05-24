<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vive Euskadi | Administrador</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>

<body>

    <div id="app" class="col-xs-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-12">
                {{-- Cabecera --}}
                @if (Route::has('login') && Route::has('register'))
                @auth
                <cabecera descubre-euskadi="{{ url('descubre-euskadi')}}" index-route="{{ url('/home')}}" user-route="{{ route('user.miPerfil', Auth::user()->id) }}" user-name="<?php echo Auth::user()->name; ?>" log-out="{{route('logout')}}" user-Admin="<?php echo Auth::user()->admin ?>" admin-route="{{url('admin/gestion-usuarios')}}"></cabecera>
                @else
                <cabecera descubre-euskadi="{{ url('descubre-euskadi')}}" index-route="{{ url('/home')}}" user-login="{{ route('login') }}" user-register="{{ route('register') }}"></cabecera>
                @endauth
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 p-0" id="barraLateral">
                <div class="img bg-wrap text-center" id="contDatos">
                    <div class="col-md-12 p-0">
                        <img src="../../images/adminPrueba.jpg" class="img-fluid" id="backAdmin">
                    </div>
                    <div id="datosAdmin">
                        <img src="../../images/login1.png" id="imgAdmin">
                        <h3>{{ Auth::user()->name }}</h3>
                        <h5>{{Auth::user()->email }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" id="btnMenuAdmin">
                        <div id="botonesLateral">
                            <a href="{{route('admin.adminUsuario')}}" class="btn ms-4 mb-3 " data-icon="&#xf0c0;" >  
                                <span>Gestión de usuarios</span>
                            </a>
                            <a href="{{route('admin.adminComent')}}" class="btn ms-4" data-icon="&#xf086;">
                                <span>Gestión de comentarios</span>
                            </a>
                        </div>
                        

                    </div>
                </div>
            </div>
            <div class="col-md-8 container p-0" id="cuerpo">
                @yield('content')
            </div>
        </div>
        <piepagina></piepagina>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>