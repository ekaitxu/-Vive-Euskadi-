@extends('layouts.user')

@section('content')
<main class="col ps-md-2 pt-2">
    <div class="page-header mt-5 ms-5 ps-4 pt-1" id="titApartado">
        <h2>Comentarios realizados</h2>
    </div>
<!--Se muesta un mensaje dependiendo de si ha borrado o no un comentario-->
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
<!--Se muestra en una tabla los comentarios de el usuario-->
    <div class="row" id="tablaContenido">
        <div class="col-8">
            <table class="table table-bordered border-dark table-striped table-hover text-center" id="myTable">
                <thead class="thead">
                    <tr>
                        <th>Comentario</th>
                        <th>Plan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comentarios as $comentario)
                    <tr>
                        <td>{{ $comentario->Texto }}</td>
                        <td>{{ $comentario->DocumentName}}</td>
                        <td>
                            <form action="{{ route('user.comentarioEdit', $comentario->IdComentario)}}" method="GET">
                                @csrf
                                @method('GET')
                                <a class="btn btn-sm btn-success w-100" href="{{ route('comentarios.edit',$comentario->IdComentario) }}"><i class="fa fa-fw fa-edit"></i> Modificar</a>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('user.comentarioDestroy',$comentario->IdComentario) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm w-100"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {!! $comentarios->links() !!}
        </div>
    </div>
    </div>
</main>
@endsection