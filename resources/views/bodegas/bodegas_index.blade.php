@section('content')
@extends('layaouts.master')
@section('titulo')  
Productos
@endsection
@extends('layaouts.layaout')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Productos</h3></div>
          <div class="pull-right">
            <div class="btn-group">
            <a href="{{route('bodegas.create')}}" class="btn btn-success mb-2">Agregar producto</a>
            </div>
          </div>
        <div class="table-container">
        <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <th>codigo</th>
                    <th>producto</th>
                    <th>numero de cajas</th>
                </thead>
                <tbody>
            @if($bodegas->count())    
                @foreach($bodegas as $bodega)
                    <tr>
                        <td>{{$bodega->codigo}}</td>
                        <td>{{$bodega->nombre}}</td>
                        <td>{{$bodega->numero_c}}</td>
                        <td><a class="btn btn-primary btn-xs" href="{{route('bodegas.edit',[$bodega->codigo])}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                        <td>
                            <form action="{{route('bodegas.destroy', [$bodega->codigo])}}" method="post">
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
</section>
@endsection