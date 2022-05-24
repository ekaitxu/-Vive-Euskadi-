@extends('layouts.user')

@section('content')
<!--En esta vista recogemos los planes favoritos del usuario y mostramos los datos necesarios. Para ello hacemos un foreach y mostramos cada pplan-->
<main class="col ps-md-2 pt-2">
    <div class="page-header mt-5 ms-5 ps-4 pt-1" id="titApartado">
        <h2>Planes en favoritos</h2>
    </div>

    <div class="row" id="planFavUser">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($favoritos as $favorito)
            <div class="col">
                <div class="card text-white">
                    <img src="/images/Imagenes/alavaDescubre.jpg" class="card-img" alt="">
                    <div class="card-img-overlay">
                        <p class="card-text position-absolute start-0 bottom-0 end-0 h-25 text-center fs-6">{{$favorito->DocumentName}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection