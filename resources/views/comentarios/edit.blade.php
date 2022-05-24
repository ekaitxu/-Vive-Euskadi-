


@extends('layouts.admin')

@section('content')
<section class="content container-fluid">
   <div class="">
       <div class="col-md-12">

           @includeif('partials.errors')

           <div class="card card-default">
               <div class="card-header">
                   <span class="card-title">Editar comentario</span>
               </div>
               <div class="card-body">
                   <form method="POST" action="{{ route('comentarios.update', $comentario->IdComentario) }}"  role="form" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf
                    <textarea  class="mx-5 mt-3" name="Texto" id="" cols="120" rows="10">{{ $comentario->Texto }}</textarea>

                    <div class="d-md-flex justify-content-md-center align-items-md-center mb-3 mt-4">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="/admin/gestion-comentarios" class="btn btn-primary mx-2">Volver atrás</a>  
                    </div>



                   </form>
               </div>
           </div>
       </div>
   </div>
</section>

</main>
@endsection