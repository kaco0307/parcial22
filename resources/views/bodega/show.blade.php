@extends('layouts.app')

@section('template_title')
    {{ $bodega->name ?? 'Show Bodega' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bodegas.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigo Produc:</strong>
                            {{ $bodega->Codigo_produc }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Producto:</strong>
                            {{ $bodega->Nombre_Producto }}
                        </div>
                        <div class="form-group">
                            <strong>Numero Cajas:</strong>
                            {{ $bodega->Numero_Cajas }}
                        </div>
                        <div class="form-group">
                            <strong>Edad Minima:</strong>
                            {{ $bodega->Edad_Minima }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
