@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <h2 class="text-center">{{ isset($payment) ? 'Editar Gasto' : 'Agregar Gasto' }}</h2>
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
                                  <label for="description">Descripción:</label>
                              <input type="text" name="description" class="form-control" value="{{ isset($payment) ? $payment->description : ''}}"/>
                              </div>
                              <div class="form-group">
                                <label for="amount">Monto:</label>
                                <input type="number" name="amount" class="form-control" value="{{ isset($payment) ? $payment->amount : ''}}"/>
                              </div>
                              <div class="form-group">
                                <label for="payment_method">Método de Pago</label>
                                <select name="payment_id" id="payment_id" class="form-control">
                                  @foreach($payments as $payment)
                                    <option value="{{ $payment->id}}"
                                      @if(isset($expense))
                                        @if($payment->id == $expense->payment_id)
                                          selected
                                        @endif
                                      @endif
                                    >
                                    {{ $payment->name }}
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="category">Categoría:</label>
                                <select name="category_id" id="category_id" class="form-control">
                                  @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                      @if(isset($expense))
                                        @if($cat->id == $expense->category_id)
                                          selected
                                        @endif
                                      @endif
                                    >
                                    {{ $cat->name }}
                                    </option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="amount">Persona que pagó (solamente pago efectivo):</label>
                                <select>

                                </select>
                              </div>
                              <div class="form-group">
                                <label for="divided">Dividido:</label>
                                <select></select>
                              </div>
                              <div class="form-group">
                                <label for="purchase_date">Fecha de compra:</label>
                                <input type="text" name="amount" class="form-control" value="{{ isset($payment) ? $payment->purchase_date : ''}}"/>
                              </div>
                              <div class="form-group">
                                <label for="comments">Comentarios:</label>
                                <textarea cols="5" name="comments" placeholder="Opcional" class="form-control" value="{{ isset($payment) ? $payment->comments : ''}}"></textarea>
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
