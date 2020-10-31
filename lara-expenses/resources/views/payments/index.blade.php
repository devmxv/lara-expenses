@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <h2 class="text-center">Formas de Pago</h2>
                    <div class="row pt-3">
                        <div class="col-sm-12">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nueva Forma de Pago</h5>
                            <a href="{{ route('payments.create') }}" class="btn btn-lg btn-success">Agregar</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3"></div>
                    <div class="row">
                        <div class="col-md-12">
                            @if($payments->count() > 0)
                                <h4 class="text-center">Métodos de Pago Registrados</h4>
                                <table class="table table-bordered mt-3">
                                    <thead>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Nombre
                                        </th>
                                        <th>
                                            Veces Usado
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->id }}</td>
                                            <td>{{ $payment->name }}</td>
                                            <td>0</td>
                                            <td>
                                                <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-md btn-secondary">Editar</a>
                                                <button class="btn btn-md btn-danger" onclick="accionEliminar({{ $payment->id }})">Eliminar</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!--Modal de eliminación de registro-->
                                <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <form action="" method="POST" id="eliminarpaymentForm">
                                    @method('DELETE')
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Eliminar paymentegoría</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <p class="text-center text-bold">Seguro quieres eliminar esta paymentegoría?</p>
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
                                <h4 class="text-center">No hay métodos de pago registrados</h4>
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
        var form = document.getElementById('eliminarpaymentForm');
        form.action = '/payments/' + id;

        $('#modalEliminar').modal('show');
    }
</script>
@endsection
