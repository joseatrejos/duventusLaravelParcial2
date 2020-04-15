<?php

namespace App\Http\Controllers;

use App\Reparacion;
use Illuminate\Http\Request;

class ReparacionApiController extends Controller
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
        $reparaciones = Reparacion::all();

        // Envío de respuesta
        return $reparaciones;
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
            $reparaciones = Reparacion::where([
                ['id_user','=', $request->user()->id],
                ['estado','=', 'Pendiente'],
                ['fecha_hora', 'LIKE',  '%' . $search . '%']
                ])->get();
        }
        else if($filter == "terminadas" || $filter == "Terminadas" || $filter == "terminado" || $filter == "Terminado")
        {
            $reparaciones = Reparacion::where([
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
        $respuesta['reparaciones'] = $reparaciones;
        
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
        $nuevaReparacion = new Reparacion();
        $nuevaReparacion -> id_user = $request -> user() -> id;
        $nuevaReparacion -> estado = $request -> input('estado');
        $nuevaReparacion -> foto = $request -> input('foto');
        $nuevaReparacion -> descripcion = $request -> input('descripcion');
        $nuevaReparacion -> fecha_hora = $request -> input('fecha_hora');
        $nuevaReparacion -> ubicacion = $request -> input('ubicacion');
        
        // Arma una respuesta
        $respuesta = array();
        $respuesta['exito'] = false;
        if($nuevaReparacion -> save()){
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
        $reparaciones = Reparacion::find($id);
        
        if($reparaciones)
        {
            $respuesta = array();
            $respuesta['reparaciones'] = $reparaciones;
        }
        else 
            $respuesta['reparaciones']= "No se encontro la reparación";
        
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
        $reparaciones = Reparacion::find($id);
        $reparaciones -> id_user = $request -> input('id_user');
        $reparaciones -> estado = $request -> input('estado');
        $reparaciones -> foto = $request -> input('foto');
        $reparaciones -> descripcion = $request -> input('descripcion');
        $reparaciones -> fecha_hora = $request -> input('fecha_hora');
        $reparaciones -> ubicacion = $request -> input('ubicacion');

        // Arma una respuesta
        $respuesta = array();
        $respuesta['exito'] = false;
        if($reparaciones -> save()){
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
