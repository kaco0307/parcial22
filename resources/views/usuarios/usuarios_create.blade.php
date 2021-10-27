@section('content')
@extends('layaouts.layaout')
@extends('layaouts.contrasena')
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
            <form method="POST" action="{{route('usuarios.store')}}">
                @csrf
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required autocomplete="off" name="nombre" class="form-control"
                           type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label class="label">Correo</label>
                    <input required autocomplete="off" name="correo" class="form-control"
                           type="text" placeholder="Correo">
                </div>
                
                <div class="form-group">
                      <div class="input-group">
                     <input ID="txtPassword" type="Password" name="password" Class="form-control" placeholder="ingrese la contraseña">
                  <button id="show_password" name="password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
               </div>
             </div>
           
              
             <div>
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route('usuarios.index')}}">Volver al listado</a>
           </div>
            </form>
        </div>
    </div>
@endsection