
@section('content')
@extends('layouts.app')
@section('contenido')
@endsection
@extends('layaouts.layaout')
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
             <div class="panel panel-default">
              <div class="panel-body">
             <div class="pull-left"><h3>Usuarios</h3></div>
               <div class="pull-right">
             <div class="btn-group">
             <a href="{{route('usuarios.create')}}" class="btn btn-success mb-2">Nuevo usuario</a>
            </div>
               </div>
              <div class="table-container">
           <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <th>nombre</th>
                    <th>correo</th>
                </thead>
                <tbody>
                @if($usuarios->count())    
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->nombre}}</td>
                        <td>{{$usuario->correo}}</td>
                        <td><a class="btn btn-primary btn-xs" href="{{route('usuarios.edit',[$usuario])}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                        <td>
                            <form action="{{route('usuarios.destroy', [$usuario])}}" method="post">
                                @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span><i class="fa fa-trash"></i></button>
                            </form>                           
                        </td>
                    </tr>
                @endforeach
            @else
            <tr>
            <td colspan="8"> No hay resgistros. </td>
            </tr>
            @endif  
            </tbody>
        </table>
        </div>
         </div>
       </div>
      </div>
@endsection