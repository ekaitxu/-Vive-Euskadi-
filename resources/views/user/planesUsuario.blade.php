@extends('layouts.user')

@section('content')
<main class="col ps-md-2 pt-2">
    <div class="page-header mt-5 ms-5 ps-4 pt-1" id="titApartado">
        <h2>Los planes de <?php echo Auth::user()->name; ?></h2>
    </div>

    <div class="row" id="componente">
        <div class="row row-cols-1 row-cols-md-12 g-4">
            <div class="col-4">
                <label class="control-label w-50 h5 text-light">Planificacion:
                    <select class="form-control" name="planificacion" id="planificacion">
                        <option value=""></option>
                        @isset($planificaciones)
                            @foreach ($planificaciones as $planificacion)
                                @isset($id_planificacion)
                                    <option value="{{$planificacion->IdPlanificacion}}" {{($planificacion->IdPlanificacion == $id_planificacion) ? 'selected' : ''}}>{{$planificacion->NombrePlanificacion}}</option>
                                @else
                                    <option value="{{$planificacion->IdPlanificacion}}">{{$planificacion->NombrePlanificacion}}</option>
                                @endisset
                            @endforeach
                        @endisset
                    </select>
                </label>  
            </div>
            <div class="col-8">
                <div class="row row-cols-1 row-cols-md-2 g-3">
                    @isset($planes)
                        @foreach($planes as $plan)
                            <div class="col">
                                <div class="card text-white">
                                    <img src="/images/Imagenes/alavaDescubre.jpg" class="card-img" alt="">
                                    <div class="card-img-overlay">
                                        <p class="card-text position-absolute start-0 bottom-0 end-0 h-25 text-center fs-5">{{$plan->DocumentName}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>
</main>


@endsection

