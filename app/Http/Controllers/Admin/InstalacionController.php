<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Instalacion;

class InstalacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instalaciones = Instalacion::all();
        $argumentos = array();
        $argumentos['instalaciones'] = $instalaciones;
        return view('admin.instalaciones.index', $argumentos);
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
        $search = $request -> input('search');

        // Retrieval of the data according to the search terms
        if($filter == "fecha")
        {
            $instalaciones = Instalacion::where('fecha_hora', 'LIKE', '%' . $search . '%')->get();
        }
        else if($filter == "estado")
        {
            $instalaciones = Instalacion::where('estado', 'LIKE', '%' . $search . '%')->get();
        } 
        else if($filter == "usuario")
        {
            $instalaciones = Instalacion::where('id_user', 'LIKE', '%' . $search . '%')->get();
        }
        
        // Data arguments with which to refresh the index page
        $argumentos = array();
        $argumentos['instalaciones'] = $instalaciones;
        return view('admin.instalaciones.index', $argumentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.instalaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instalaciones = new Instalacion();
        $instalaciones -> id_user = $request -> input('id_user');
        $instalaciones -> estado = $request -> input('estado');
        $instalaciones -> foto = $request -> input('foto');
        $instalaciones -> fecha_hora = $request -> input('fecha_hora');
        $instalaciones -> ubicacion = $request -> input('ubicacion');

        if($instalaciones -> save())
        {
            return redirect() -> route('instalaciones.index') -> with('success', 'La instalación fue guardada correctamente');
        }
        // In case the if() doesn't finish the execution of the code with the return, then cookies will be used to validate 
        return redirect() -> route('instalaciones.index') -> with('failure', 'La instalación no pudo ser guardada correctamente');
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
        
        if($instalaciones)
        {
            $argumentos = array();
            $argumentos['instalaciones'] = $instalaciones;
            return view('admin.instalaciones.show', $argumentos);
        }
        
        return redirect() -> route('instalaciones.index' -> with('failure', 'No se encontró la instalación'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find primary key
        $instalaciones = Instalacion::find($id);

        if($instalaciones)
        {
            $argumentos = array();
            $argumentos['instalaciones'] = $instalaciones;
            return view('admin.instalaciones.edit', $argumentos);
        }
        
        return redirect() -> route('instalaciones.index' -> with('failure', 'No se encontró la instalación'));
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
        // Busca un registro a partir de la llave primaria (SELECT * FROM Noticia)
        $instalaciones = Instalacion::find($id);
        if($instalaciones)
        {
            $instalaciones -> id_user = $request -> input('id_user');
            $instalaciones -> estado = $request -> input('estado');
            $instalaciones -> foto = $request -> input('foto');
            $instalaciones -> fecha_hora = $request -> input('fecha_hora');
            $instalaciones -> ubicacion = $request -> input('ubicacion');
            
            if($instalaciones -> save())
            {
                return redirect() -> route('instalaciones.edit', $id) -> with('success', 'La instalación se actualizó exitosamente');
            }
            // If instalación can't be updated
            return redirect() -> route('instalaciones.edit', $id) -> with('failure', 'No se pudo actualizar la instalación');
        }
        // If instalación isn't even found
        return redirect() -> route('instalaciones.index') -> with('failure', 'No se encontró la instalación');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instalaciones = Instalacion::find($id);
        
        if($instalaciones) {
            if($instalaciones -> delete()){
                return redirect() -> route('instalaciones.index') -> with('exito', 'Instalación eliminada exitosamente');
            }
            return redirect() -> route('instalaciones.index') ->with('failure', 'No se pudo eliminar la instalación');
        }
        return redirect() -> route('instalaciones.index') -> with('failure', 'No se encontró la instalación');
    }
}
