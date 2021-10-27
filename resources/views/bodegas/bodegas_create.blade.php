@extends('layaouts.layaout')
@section('content')
<div class="container">
        @if(count($errors) > 0)
            <div class="alert alert-warning" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif </br>
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route('bodegas.store')}}">
                @csrf
                <div class="form-group">
                    <label class="label">Codigo</label>
                    <input required autocomplete="off" name="codigo" class="form-control"
                           type="text" placeholder="Codigo">
                </div>
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required autocomplete="off" name="nombre" class="form-control"
                           type="text" placeholder="Nombre del producto">
                </div>
                <div class="form-group">
                    <label class="label">Numero de cajas</label>
                    <input required autocomplete="off" name="numero_c" class="form-control"
                           type="number" placeholder="Numero de cajas">
                </div>

                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route('bodegas.index')}}">Volver al listado</a>
            </form>
        </div>
    </div>
@endsection