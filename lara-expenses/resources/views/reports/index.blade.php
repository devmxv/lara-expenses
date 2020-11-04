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
                                <h5 class="card-title">Enviar Reporte de Gastos</h5>
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
                                          Forma de Pago
                                        </th>
                                        <th>
                                          Fecha
                                        </th>
                                        <th>
                                          Descripción
                                        </th>
                                        <th>
                                          Costo
                                        </th>
                                        <th>
                                          ¿Dividido?
                                        </th>
                                        <th>
                                          Monto dividido
                                        </th>
                                        <th>
                                          Pago a TDC
                                        </th>
                                        <th>
                                          Lo que le debo a Mayra
                                        </th>
                                        <th>
                                          ¿Quién Pagó?*
                                        </th>
                                        <th>
                                          Comentarios
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($expenses as $expense)
                                        <tr>
                                            <td>{{ $expense->id }}</td>
                                            <td>{{ $expense->payment->name }}</td>
                                            <td>{{ date('j F, Y', strtotime($expense->purchase_date)) }}</td>
                                            <td>{{ $expense->description }}</td>
                                            <td>${{ $expense->amount }}</td>
                                            @if($expense->isDivided == 1)

                                              <td>Sí</td>
                                              <td>
                                                ${{ ($expense->amount) / 2 }}
                                              </td>
                                              <td>
                                                ${{ $expense->amount }}
                                              </td>
                                              <td>
                                                ${{ ($expense->amount) / 2 }}
                                              </td>
                                              <td>
                                                {{ $expense->user->name }}
                                              </td>
                                              <td>
                                                {{ $expense->comments }}
                                              </td>
                                            @else
                                              <td>No</td>
                                              <td>N/A</td>
                                              <td>
                                                ${{ $expense->amount }}
                                              </td>
                                              <td>
                                                ${{ ($expense->amount) / 2 }}
                                              </td>
                                              <td>
                                                N/A
                                              </td>
                                              <td>
                                                {{ $expense->comments }}
                                              </td>
                                            @endif

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="col-md-12">
                                  <h5 class="float-right"><strong>Total Pago a TDC Mensual:</strong> ${{ $expenses->sum('amount')}}</h5>
                                </div>
                            @else
                                <h4 class="text-center">No hay gastos registrados</h4>
                            @endif
                        </div>
                    </div>
                    <strong>* Sólo aplica pago en efectivo</strong>

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
