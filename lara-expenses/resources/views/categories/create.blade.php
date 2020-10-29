@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <h2 class="text-center">Agregar Categoría</h2>

                    <div class="p-3"></div>
                    <div class="row">
                        <div class="col-md-6">

                        <form action="{{ route('categories.store') }}" method="POST">
                              @csrf
                              <div class="form-group">
                                  <label for="name">Nombre Categoría:</label>
                                  <input type="text" name="name" class="form-control"/>
                              </div>
                              <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-success">
                                  Agregar
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
