@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <h2 class="text-center">{{ isset($payment) ? 'Editar Categoría' : 'Agregar Categoría' }}</h2>
                    @include('partials.errors')
                    <div class="p-3"></div>
                    <div class="row">
                        <div class="col-md-8">

                        <form action="{{ isset($payment) ? route('payments.update', $payment->id) : route('payments.store') }}"
                          method="POST">
                              @csrf
                              @if(isset($payment))
                                @method('PUT')
                              @endif
                              <div class="form-group">
                                  <label for="name">Nombre Método de Pago:</label>
                              <input type="text" name="name" class="form-control" value="{{ isset($payment) ? $payment->name : ''}}"/>
                              </div>
                              <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-success">
                                  {{ isset($payment) ? 'Actualizar' : 'Agregar'}}
                                </button>
                              </div>
                          </form>
                        </div>

                    </div>
                </div>
                @include('partials.back')
                <p class="text-center"><i>Una aplicación desarrollada por Martín Vázquez usando Laravel 5.8</i></p>
            </div>
        </div>
    </div>
</div>
@endsection
