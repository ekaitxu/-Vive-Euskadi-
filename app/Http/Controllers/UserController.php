<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favoritos;
use App\Models\Comentarios;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Funcion que redirije al layout, pero en la seccion de user
    public function index()
    {
        return view('layouts.user');
    }
    //Estas funciones hacen redirecciones a las pestañas diferentes 
    public function datosUsuario($id)
    {
        $user = User::find($id);
        return view('user.datosUsuario', compact('user'));
    }

    public function planesUsuario()
    {
        return view('user.planesUsuario');
    }
    //Funcion que nos mostrar los planes que guarda en favorito cada usuario
    public function planesFavUsuario()
    {
        $favoritos = Favoritos::where('id', Auth::user()->id)->paginate(6);
        return view('user.planesFavUsuario', ['favoritos'=>$favoritos]);
    }
    //Funcion que nos mostrar los comentarios que ha creado cada usuario
    public function comentariosUsuario()
    {
        $comentarios = Comentarios::where('id', Auth::user()->id)->paginate(6);
        return view('user.comentariosUsuario',['comentarios'=>$comentarios]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Funcion que eliminara el comentario requerido por el usuario. Se hace una referencia al destroy del controller de los comentarios. Se crea un mensaje que al eliminar se muestra
    public function destroy($id)
    {
        app('App\Http\Controllers\ComentariosController')->borrarComentario($id)->with('mensaje', 'Comentario borrado con exito');
        return redirect('/user/comentariosUsuario');
    }
}
