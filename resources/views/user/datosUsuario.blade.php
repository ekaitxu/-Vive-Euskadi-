@extends('layouts.user')

@section('content')
<main class="col ps-md-2 pt-2" id="mainDatosUser">
    <div class="page-header mt-5 ms-5 ps-4 pt-1" id="titApartado">
        <h2>Bienvenido {{ $user->name }}</h2>
    </div>

    <div class="col-md-12">

        @includeif('partials.errors')

        <div class="card card-default">
            <div class="card-header">
                <span class="card-title">Editar {{ $user->name }}</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.update', $user->id) }}"  role="form" enctype="multipart/form-data">
                 {{ method_field('PATCH') }}
                 @csrf

                {{--  <div class="d-flex justify-content-center">
                     <img src="/images/Imagenes/bodyDescubre.jpg" class="img-fluid circular--square" alt="" id="imgUser">
                 </div> --}}




                  <div class="drag-drop">
                     @if($user->foto)
                         <img src="/images/Usuarios/{{ $user->foto }}" style="width: 100px; height: 100px;" alt="">
                     @endif
                 </div>
                 <div>
                     <input name="foto" type="file"/>
                     {{-- <span class="fa-stack fa-2x">
                         <i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>
                         <i class="fa fa-circle fa-stack-1x top medium"></i>
                         <i class="fa fa-arrow-circle-up fa-stack-1x top"></i>
                     </span> --}}
                     <span class="desc">Pulse aquí para añadir una foto</span>
                 </div>

                 <div class="mb-3">
                  <label for="nombre">Nombre: </label>  
                  <input id="nombre" type="text" name="name" class="form-control" value={{ $user->name }}>                    
                 </div>

                 <div class="mb-3">
                  <label for="email">Email: </label>  
                  <input type="email" name="email" class="form-control" value={{ $user->email }}>                   
                 </div>

                 <div class="mb-3">
                  <label for="admin">Nivel: </label>  
                  <select name="admin" class="form-control mb-3">
                      <option value={{ $user->admin == 1 ? "1" : "0" }}>{{ $user->admin == 1 ? "Administrador" : "Usuario" }}</option>
                      <option value={{ $user->admin == 1 ? "0" : "1" }}>{{ $user->admin == 1 ? "Usuario" : "Administrador" }}</option>
                  </select>            
                 </div>

                 <div class="d-md-flex justify-content-md-center align-items-md-center mb-3">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a href="/admin/gestion-usuarios" class="btn btn-primary mx-2">Volver atrás</a>
                 
               </div>
                </form>
            </div>
        </div>
    </div>
























    {{-- <div class="row" id="datosUsuario">
        <div class="col">
            <form class="mt-4">
                <div class="row">
                    <div class="form-group col">
                        <input type="text" class="form-group form-control-lg w-100" placeholder="Nombre" id="nombre" name="nombre" value={{ $user->name }}>
                    </div>
                    <div class="form-group col">
                        <input type="text" class="form-group form-control-lg w-100" placeholder="Apellidos" name="apellidos" id="apellidos">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <input type="text" class="form-group form-control-lg w-100" placeholder="Email" id="email" name="email" value={{ $user->email }}>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <hr style="border-color: black;">
                    </div>
                    <div class="col">
                        <h3>Cambiar contraseña</h3>
                    </div>
                    <div class="col">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <input type="text" class="form-group form-control-lg  w-100" placeholder="Contraseña antigua" id="contraAnt" name="contraAnt">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <input type="text" class="form-group form-control-lg w-100" placeholder="Contraseña nueva" id="contraNue" name="contraNue">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" id="botonForm" class="btn border border-dark">Guardar datos</button>
                </div>
            </form>
        </div>
    </div> --}}
</main>
@endsection