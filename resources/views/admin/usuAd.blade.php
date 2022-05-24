@extends('layouts.admin')

@section('content')
<main class="col p-0">
    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif (Session::has('mensajeError'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('mensajeError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="row" id="tablaContenido">
        <div class="col-12 text-start" id="contBtnCrear">
            <a href="{{ route('admin.create') }}" class="btn btn-primary"  id="btnCrear">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
                {{ __(' Crear nuevo usuario') }}
              </a>
        </div>  
        <div class="col-12">
            <table class="table table-bordered border-dark table-striped table-hover" id="myTable">
                <thead class="thead">
                    <tr>
                        <tr>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Opciones</th>
                        </tr>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>

                            <td>
                                <form action="{{ route('admin.destroyUsuario',$user->id) }}" method="POST">
                                    <a class="btn btn-sm btn-success" href="{{ route('admin.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> Modificar</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
            <div id="pagination">
                {!! $users->links() !!}
            </div>
            
        </div>  

        
    </div>





    







</main>



@endsection