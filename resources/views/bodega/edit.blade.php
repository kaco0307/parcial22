@extends('layouts.app')

@section('template_title')
    Update Bodega
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Bodega</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('bodegas.update', $bodega->Codigo_produc) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('bodega.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
