<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Reparacion;

class ReparacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reparaciones = Reparacion::all();
        $argumentos = array();
        $argumentos['reparaciones'] = $reparaciones;
        return view('admin.reparaciones.index', $argumentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reparaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reparaciones = new Reparacion();
        $reparaciones -> id_user = $request -> input('id_user');
        $reparaciones -> estado = $request -> input('estado');
        $reparaciones -> foto = $request -> input('foto');
        $reparaciones -> descripcion = $request -> input('descripcion');
        $reparaciones -> fecha_hora = $request -> input('fecha_hora');
        $reparaciones -> ubicacion = $request -> input('ubicacion');

        if($reparaciones -> save())
        {
            return redirect() -> route('reparaciones.index') -> with('success', 'La reparación fue guardada correctamente');
        }
        // In case the if() doesn't finish the execution of the code with the return, then cookies will be used to validate 
        return redirect() -> route('reparaciones.index') -> with('failure', 'La reparación no pudo ser guardada correctamente');
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
            $argumentos = array();
            $argumentos['reparaciones'] = $reparaciones;
            return view('admin.reparaciones.show', $argumentos);
        }
        
        return redirect() -> route('reparaciones.index' -> with('failure', 'No se encontró la reparación'));
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
        $reparaciones = Reparacion::find($id);

        if($reparaciones)
        {
            $argumentos = array();
            $argumentos['reparaciones'] = $reparaciones;
            return view('admin.reparaciones.edit', $argumentos);
        }
        
        return redirect() -> route('reparaciones.index' -> with('failure', 'No se encontró la reparación'));
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
        $reparaciones = Reparacion::find($id);
        if($reparaciones)
        {
            $reparaciones -> id_user = $request -> input('id_user');
            $reparaciones -> estado = $request -> input('estado');
            $reparaciones -> foto = $request -> input('foto');
            $reparaciones -> descripcion = $request -> input('descripcion');
            $reparaciones -> fecha_hora = $request -> input('fecha_hora');
            $reparaciones -> ubicacion = $request -> input('ubicacion');
            
            if($reparaciones -> save())
            {
                return redirect() -> route('reparaciones.edit', $id) -> with('success', 'La reparación se actualizó exitosamente');
            }
            // If reparación can't be updated
            return redirect() -> route('reparaciones.edit', $id) -> with('failure', 'No se pudo actualizar la reparación');
        }
        // If reparación isn't even found
        return redirect() -> route('reparaciones.index') -> with('failure', 'No se encontró la reparación');
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
            $reparaciones = Reparacion::where('fecha_hora', 'LIKE', '%' . $search . '%')->get();
        }
        else if($filter == "estado")
        {
            $reparaciones = Reparacion::where('estado', 'LIKE', '%' . $search . '%')->get();
        } 
        else if($filter == "usuario")
        {
            $reparaciones = Reparacion::where('id_user', 'LIKE', '%' . $search . '%')->get();
        }
        
        // Data arguments with which to refresh the index page
        $argumentos = array();
        $argumentos['reparaciones'] = $reparaciones;
        return view('admin.reparaciones.index', $argumentos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reparaciones = Reparacion::find($id);
        
        if($reparaciones) {
            if($reparaciones -> delete()){
                return redirect() -> route('reparaciones.index') -> with('exito', 'Reparación eliminada exitosamente');
            }
            return redirect() -> route('reparaciones.index') ->with('failure', 'No se pudo eliminar la reparación');
        }
        return redirect() -> route('reparaciones.index') -> with('failure', 'No se encontró la reparación');
    }
}
