<div class="box box-info padding-1">
    <div class="box-body">
      
        <div class="form-group">
            {{ Form::label('Codigo_produc') }}
            {{ Form::text('Codigo_produc', $bodega->Codigo_produc, ['class' => 'form-control' . ($errors->has('Codigo_produc') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Producto']) }}
            {!! $errors->first('Codigo_produc', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre_Producto') }}
            {{ Form::text('Nombre_Producto', $bodega->Nombre_Producto, ['class' => 'form-control' . ($errors->has('Nombre_Producto') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Producto']) }}
            {!! $errors->first('Nombre_Producto', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Numero_Cajas') }}
            {{ Form::number('Numero_Cajas', $bodega->Numero_Cajas, ['class' => 'form-control', 'min' => '1' . ($errors->has('Numero_Cajas') ? ' is-invalid' : ''), 'placeholder' => 'Numero Cajas']) }}
            {!! $errors->first('Numero_Cajas', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Edad_Minima') }}
            {{ Form::number('Edad_Minima', $bodega->Edad_Minima, ['class' => 'form-control', 'min' => '1' . ($errors->has('Edad_Minima') ? ' is-invalid' : ''), 'placeholder' => 'Edad Minima']) }}
            {!! $errors->first('Edad_Minima', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Crear</button>
    </div>
    <div class="float-right">
        <a class="btn btn-sm btn-success" href="{{ route('bodegas.index') }}"> volver</a>
    </div>
</div>