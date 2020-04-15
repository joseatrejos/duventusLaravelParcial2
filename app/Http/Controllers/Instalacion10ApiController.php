<?php

namespace App\Http\Controllers;

use App\Instalacion;
use Illuminate\Http\Request;

class Instalacion10ApiController extends Controller
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
        // Cada respuesta regresa 20 casas

        // Solicitud de Información
        $paginaActual = intval( $request -> input('pagina') );
        if(!$paginaActual) {
            $paginaActual = 1;
        }
        $numeroInstalaciones = Instalacion::count();
        $numeroPaginas = ceil($numeroInstalaciones / 20);

        $instalaciones = Instalacion::where('id_user', $request -> user() -> id) -> skip( ($paginaActual - 1) * 20 ) -> take(20) -> get();

        // Construcción de respuesta
        $respuesta = array();
        $respuesta['total'] = $numeroInstalaciones;
        $respuesta['paginas'] = $numeroPaginas;
        $respuesta['pagina_actual'] = $paginaActual;
        $respuesta['instalaciones'] = $instalaciones;

        // Envío de respuesta
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
