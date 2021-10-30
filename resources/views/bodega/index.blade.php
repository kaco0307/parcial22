@extends('layouts.app')

@section('template_title')
    Bodega
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Productos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('bodegas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Añadir Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Codigo Producto</th>
										<th>Nombre Producto</th>
										<th>Numero Cajas</th>
										<th>Edad Minima</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bodegas as $bodega)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $bodega->Codigo_produc }}</td>
											<td>{{ $bodega->Nombre_Producto }}</td>
											<td>{{ $bodega->Numero_Cajas }}</td>
											<td>{{ $bodega->Edad_Minima }}</td>

                                            <td>
                                                <form action="{{ route('bodegas.destroy',$bodega->Codigo_produc) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('bodegas.show',$bodega->Codigo_produc) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('bodegas.edit',$bodega->Codigo_produc) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $bodegas->links() !!}
            </div>
        </div>
    </div>
@endsection
