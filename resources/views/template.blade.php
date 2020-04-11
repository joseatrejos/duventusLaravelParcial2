@extends('layouts.admin')


@section('maincss')

@endsection


@section('titulo', 'Administración | Titulo')
@section('subtitulo', 'Lista de Noticias')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!--div class="card-header">
                    <h3 class="card-title">
                        Lista de noticias
                    </h3>
                </div-->
                <div class="card-body">
                    <a href="" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Agregar Reparación
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Reparacion
                                </th>
                                <th>
                                    Acciones
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('mainjs')

@endsection
