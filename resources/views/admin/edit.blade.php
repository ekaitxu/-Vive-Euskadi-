


@extends('layouts.admin')

@section('content')
<section class="content container-fluid">
   <div class="">
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
   </div>
</section>

</main>
@endsection