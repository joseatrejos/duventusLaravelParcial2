<?php

namespace App\Http\Controllers;

use App\Instalacion;
use Illuminate\Http\Request;

class InstalacionApiController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Solicitud de Información
        $instalaciones = Instalacion::all();


        // Envío de respuesta
        return $instalaciones;
    }

    /**
     * Display a list of items depending on the search criteria.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Search terms
        $filter = $request -> input('filtro');
        $search = $request -> input('fecha');

        // Retrieval of the data according to the search terms
        if($filter == "pendientes" || $filter == "Pendientes" || $filter == "pendiente" || $filter == "Pendiente")
        {
            $instalaciones = Instalacion::where([
                ['id_user','=', $request->user()->id],
                ['estado','=', 'Pendiente'],
                ['fecha_hora', 'LIKE',  '%' . $search . '%']
                ])->get();
        }
        else if($filter == "terminadas" || $filter == "Terminadas" || $filter == "terminado" || $filter == "Terminado")
        {
            $instalaciones = Instalacion::where([
                ['id_user','=', $request->user()->id],
                ['estado','=', 'Terminado'],
                ['fecha_hora', 'LIKE',  '%' . $search . '%']
                ])->get();
        } else 
        {
            return "No se encontró ningun registro";
        }
        
        // Construcción del JSON de respuesta
        $respuesta = array();
        $respuesta['instalaciones'] = $instalaciones;
        
        return $respuesta;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevaInstalacion = new Instalacion();
        $nuevaInstalacion -> id_user = $request -> user() -> id;
        $nuevaInstalacion -> estado = $request -> input('estado');
        $nuevaInstalacion -> foto = $request -> input('foto');
        $nuevaInstalacion -> fecha_hora = $request -> input('fecha_hora');
        $nuevaInstalacion -> ubicacion = $request -> input('ubicacion');
        
        // Arma una respuesta
        $respuesta = array();
        $respuesta['exito'] = false;
        if($nuevaInstalacion -> save()){
            $respuesta['exito'] = true;
        }

        // Regresa una respuesta
        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find primary key
        $instalaciones = Instalacion::find($id);

        if($instalaciones){

            $respuesta = array();
            $respuesta['instalaciones'] = $instalaciones;
        } 
        else 
            $respuesta['instalaciones']= "No se encontro la instalación";

        return $respuesta;
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
        $instalaciones = Instalacion::find($id);
        $instalaciones -> id_user = $request -> input('id_user');
        $instalaciones -> estado = $request -> input('estado');
        $instalaciones -> foto = $request -> input('foto');
        $instalaciones -> fecha_hora = $request -> input('fecha_hora');
        $instalaciones -> ubicacion = $request -> input('ubicacion');

        // Arma una respuesta
        $respuesta = array();
        $respuesta['exito'] = false;
        if($instalaciones -> save()){
            $respuesta['exito'] = true;
        }

        // Regresa una respuesta
        return $respuesta;
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
