@extends('layouts.user')

@section('content')
<main class="col ps-md-2 pt-2">
    <div class="page-header mt-5 ms-5 ps-4 pt-1" id="titApartado">
        <h2>Comentarios realizados</h2>
    </div>
    <div class="row" id="datosUsuario">
        <div class="col">
            <form class="mt-4" method="POST" action="{{route('user.comentarioUpdate', $comentario->IdComentario)}}">
            @csrf
            @method('PUT')
            {{print($comentario->IdComentario)}}            
                <div class="row">
                    <div class="form-group">
                        <input type="text" class="form-group form-control-lg w-100" placeholder="Texto del comentario" id="texto" name="texto" value="{{$comentario->Texto}}">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" id="botonForm" class="btn border border-dark">Editar comentario</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</main>
@endsection