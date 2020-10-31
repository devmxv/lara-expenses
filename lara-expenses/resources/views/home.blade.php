@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Inicio</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2 class="text-center">Reporte de gastos personales</h2>
                    <p class="text-center">Esta es una aplicación web que me permite reportar
                        mis gastos personales o que comparto. También puedo saber qué método de pago usé
                        y evitar confusiones
                    </p>
                    <h3 class="text-center">Usa las opciones para poder hacer una operación:</h3>
                    <div class="row pt-3">
                        <div class="col-sm-6">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Vistazo a Gastos</h5>
                                <p class="card-text">Visualizar los gastos reportados y poder filtrar por diversos criterios</p>
                            <a href="" class="btn btn-primary">Vamos!</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Gastos</h5>
                                <p class="card-text">Registrar, modificar o eliminar gastos dentro de la aplicación.</p>
                            <a href="{{ route('expenses.index') }}" class="btn btn-primary">Vamos!</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Métodos de Pago</h5>
                                <p class="card-text">Registrar, modificar o eliminar métodos de pago usados en las compras.</p>
                            <a href="{{ route('payments.index') }}" class="btn btn-primary">Entrar</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Categorías</h5>
                                <p class="card-text">Registrar, modificar o eliminar categorías de los gastos reportados.
                                    Permite clasificar si fue alguna compra de comida, algo de la casa, de servicios, etc.
                                </p>
                            <a href="{{ route('categories.index') }}" class="btn btn-primary">Entrar</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-center"><i>Una aplicación desarrollada por Martín Vázquez usando Laravel 5.8</i></p>
            </div>
        </div>
    </div>
</div>
@endsection
