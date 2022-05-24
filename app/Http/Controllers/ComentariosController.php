<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Comentarios;
use Illuminate\Support\Facades\Auth;

class ComentariosController extends Controller
{
    public function mostrarComentarios($documentName)
    {
        // $result = DB::select('select * from comentarios where DocumentName = ?', [$documentName]);
        $result = Comentarios::where('id', Auth::user()->id);
        return $result;
        
    }
    //Función que hace una inserccion en la tabla de comentarios usando la id del usuario y el plan en el que se ha hecho el comentario
    public function insertarComentario( $idUser, $plan, $comentario, $territorio) {
        DB::insert('insert into planes (DocumentName, Provincia) values (?, ?) ON DUPLICATE KEY UPDATE DocumentName=DocumentName', [$plan, $territorio]);
        DB::insert('insert into comentarios (id, DocumentName, Texto, Fecha) values (?, ?, ?, ?) ON DUPLICATE KEY UPDATE DocumentName = DocumentName', [$idUser, $plan, $comentario, now()]);
    }

    //Función que eliminara el comentario recibiendo el id de el comentario a borrar 
    public function borrarComentario($IdComentario) {
        
        if ($IdComentario != null) {
            Comentarios::where('IdComentario', $IdComentario)->delete(); 
            return redirect()->route('user.comentariosUsuario')->with('mensaje','Comentario borrado con éxito'); 
        }
        
        return redirect()->route('user.comentariosUsuario')->with('mensaje','No id');
    }

    public function editarComentarios($IdComentario){ 
        $comentario=Comentarios::where('IdComentario', $IdComentario)->first();
        
        return view('user.comentariosEditar', ['comentario'=>$comentario]);
    }

    public function updateComentarios(Request $peticion, $IdComentario){
        $peticion->validate([
            'texto' => 'required',
        ]);
        $comentarios = Comentarios::where('IdComentario', $IdComentario)->first();
        $comentarios->Texto = $peticion->input('texto');
        $comentarios->save();
        
        return redirect()->route('user.comentariosUsuario')->with('mensaje','Comentario modificado con exito');
    }
    public function edit($IdComentario)
    {
        $comentario = Comentarios::find($IdComentario);
        return view('comentarios.edit', compact('comentario'));
    }
    
    public function update(Request $request, Comentarios $IdComentario)
    {

        $requestData = $request->all();
        /* $comentario = Comentarios::where('IdComentario',$IdComentario)->firstOrFail(); */
        $IdComentario->update($requestData);
        return redirect()->route('admin.adminComent')
            ->with('mensaje', 'El comentario ha sido modificado correctamente');
        
    }
}
