@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <h2 class="text-center">Gastos</h2>
                    <div class="row pt-3">
                        <div class="col-sm-12">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nuevo Gasto</h5>
                            <a href="{{ route('expenses.create') }}" class="btn btn-lg btn-success">Agregar</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3"></div>
                    <div class="row">
                        <div class="col-md-12">
                            @if($expenses->count() > 0)
                                <h4 class="text-center">Últimos gastos registrados</h4>
                                <table class="table table-bordered mt-3">
                                    <thead>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                          Fecha
                                        </th>
                                        <th>
                                          Descripción
                                        </th>
                                        <th>
                                          Monto
                                        </th>
                                        <th>
                                          Acciones
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($expenses as $expense)
                                        <tr>
                                            <td>{{ $expense->id }}</td>
                                            <td>{{ date('j F, Y', strtotime($expense->purchase_date)) }}</td>
                                            <td>{{ $expense->description }}</td>
                                            <td>${{ $expense->amount }}</td>
                                            <td>
                                                <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-md btn-secondary">Editar</a>
                                                <button class="btn btn-md btn-danger" onclick="accionEliminar({{ $expense->id }})">Eliminar</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!--Modal de eliminación de registro-->
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <form action="" method="POST" id="deleteExpenseForm">
                                    @method('DELETE')
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Eliminar Gasto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <p class="text-center text-bold">Seguro quieres eliminar este gasto?</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <!-- // Fin modal de eliminación de registro -->
                            @else
                                <h4 class="text-center">No hay gastos registrados</h4>
                            @endif

                        </div>
                    </div>
                </div>
            <a style="font-size: 15px;" href="{{ route('home') }}">Regresar a Inicio</a>
                <p class="text-center"><i>Una aplicación desarrollada por Martín Vázquez usando Laravel 5.8</i></p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function accionEliminar(id){
        var form = document.getElementById('deleteExpenseForm');
        form.action = '/expenses/' + id;

        $('#deleteModal').modal('show');
    }
</script>
@endsection
