<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class PlanesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Funcion que redirije a la vista de busqueda con la id, la id se usa como filtro para hacer una busqueda entre los planes
    public function show($id)
    {
        return view('busqueda')->with('id', $id);
    }

    public function plan($id, $nombre)
    {
        return view('busqueda')->with('id', $id)->with('nombre',$nombre);
    }
    //Funcion que hace una insercion en la tabla planes y otra en favoritoss. Esta funcion esta hecha para que un plan se inserte en favoritos
    public function insertarFavoritos( $id, $documentname, $territory)
    {
        DB::insert('insert into planes (DocumentName, Provincia) values (?, ?) ON DUPLICATE KEY UPDATE DocumentName=DocumentName', [$documentname, $territory]);
        DB::insert('insert into favoritos (id, DocumentName) values (?, ?) ON DUPLICATE KEY UPDATE DocumentName=DocumentName', [$id, $documentname]);
    }

    //Funcion que elimina un registro de favoritos
    public function borrarFavoritos($id, $documentname)
    {
        DB::delete('delete from favoritos where id = ? and DocumentName = ?',[$id,$documentname]);
    }
    //Funcion que hace una consulta de la tabla de favoritos. 
    public function selectFavoritos($id)
    {
        $results = DB::select('select DocumentName from favoritos where id = ?',[$id]);
        return $results;
    }

    public function insertarPlanificacion( $id, $nombre, $descripcion)
    {
        DB::insert('insert into planificacion (id, NombrePlanificacion, Descripcion) values (?, ?, ?) ON DUPLICATE KEY UPDATE NombrePlanificacion=NombrePlanificacion', [$id, $nombre, $descripcion]);
    }
    public function selectPlanificaciones($id)
    {
        $results = DB::select('select * from planificacion where id = ?',[$id]);
        return $results;
    }

    public function insertarPlanPlanificacion( $idPlanificacion, $nombrePlan,)
    {
        DB::insert('insert into planes (DocumentName, Provincia) values (?, ?) ON DUPLICATE KEY UPDATE DocumentName=DocumentName', [$nombrePlan, 'undefined']);
        DB::insert('insert into agrupa (IdPlanificacion, DocumentName) values (?, ?) ON DUPLICATE KEY UPDATE DocumentName=DocumentName', [$idPlanificacion, $nombrePlan]);
    }

    public function selectPlanesPlanificacion( $id)
    {
        $results = DB::select('select DocumentName from agrupa, planificacion where agrupa.IdPlanificacion=planificacion.IdPlanificacion and id = ? Group by DocumentName',[$id]);
        return $results;
    }

    public function edit($plan)
    {
        
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
    public function destroy($id)
    {
        //
    }
}
