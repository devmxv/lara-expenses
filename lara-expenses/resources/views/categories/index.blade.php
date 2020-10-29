@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <h2 class="text-center">Categorías</h2>
                    <div class="row pt-3">
                        <div class="col-sm-6">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nueva Categoría</h5>
                                <a href="#" class="btn btn-primary">Agregar</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-center">Categorías registradas</h4>
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Veces Usada
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Test</td>
                                        <td>3</td>
                                        <td>Botones</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <p class="text-center"><i>Una aplicación desarrollada por Martín Vázquez usando Laravel 5.8</i></p>
            </div>
        </div>
    </div>
</div>
@endsection
