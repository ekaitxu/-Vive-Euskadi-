<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comentarios;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Funcion que redirije al layout de usuarios, pero a la sección de admin
    public function index()
    {
        return view('layouts.admin');
    }

    public function adminComent()
    {
        //funcion para mostrar los comentarios desde la base de datos en el apartado de admin
        $comentarios = Comentarios::paginate(5);
        foreach($comentarios as $comentario){
            $filaUser = User::findOrFail($comentario->id);
            Arr::add($comentario, 'nombre_usuario', $filaUser->name);
        }
        return view('admin.comenAd')->with('comentarios', $comentarios);
    }

    public function adminUsuario()
    {
       //funcion para mostrar los usuarios desde la base de datos en el apartado de admin
        $users = User::paginate(5);
        return view('admin.usuAd')->with('users', $users);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('admin.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $validator = Validator::make($requestData, User::$rules, User::$messages, User::$customAttributes);

        if ($validator->fails()) {
            return redirect()->route('admin.create')
                        ->withErrors($validator)->withInput();
        }

        Arr::set($requestData,'password', Hash::make($requestData['password']));
        $user = User::create($requestData);
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            if($foto->isValid()){
                $extension = $foto->extension();
                $nombreFichero = $user->id.'.'.$extension;
                copy($foto->getRealPath(), public_path("images\\Usuarios").'\\'.$nombreFichero);
                $requestData['foto'] = $nombreFichero;
            }
            $user->update($requestData);
        }
        return redirect()->route('admin.adminUsuario')
        ->with('mensaje', 'El usuario ha sido añadido correctamente');
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
        $user = User::find($id);
        return view('admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        
        $requestData = $request->all();
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            if($foto->isValid()){
                $extension = $foto->extension();
                $nombreFichero = $admin->id.'.'.$extension;
                copy($foto->getRealPath(), public_path("images\\Usuarios").'\\'.$nombreFichero);
                $requestData['foto'] = $nombreFichero;
            }
        }

        $admin->update($requestData);
        return redirect()->route('admin.adminUsuario')
            ->with('mensaje', 'El usuario '.$admin->name.' ha sido modificado correctamente.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyComent($id)
    {
        $comentario = Comentarios::where('IdComentario',$id)->delete();
        return redirect()->route('admin.adminComent')->with('mensaje','Comentario borrado con éxito');
    }

    public function destroyUsuario($id)
    {
        //Funcion que elimina un usuario creado por algun usuario. Se crea un mensaje para confirmar el borrado
        $user = User::find($id)->delete();
        return redirect()->route('admin.adminUsuario')->with('mensaje','Usuario borrado con éxito');
    }
}
