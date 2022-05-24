@extends('layouts.user')

@section('content')
<main class="col ps-md-2 pt-2" id="mainDatosUser">
    <div class="page-header mt-5 ms-5 ps-4 pt-1 mb-3" id="titApartado">
        <h2>Bienvenido {{ $user->name }}</h2>
    </div>

    @if (!empty($mensaje))
    <div class="alert alert-success alert-dismissible fade show ms-5" role="alert">
        {{ $mensaje }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif

    <div class="col-md-12">

        @includeif('partials.errors')

        <div class="card card-default mb-5 ms-5">
            <div class="card-header">
                <span class="card-title">Editar {{ $user->name }}</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.update', $user->id) }}">
                    {{ method_field('PATCH') }}
                    @csrf

                    <div class="drag-drop">
                        @if($user->foto)
                            <img src="/images/Usuarios/{{ $user->foto }}" style="width: 100px; height: 100px;" alt="">
                        @endif
                    </div>
                    <div class="mb-3">
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
                    <div class="d-md-flex justify-content-md-center align-items-md-center mb-3">
                     <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
</main>
@endsection