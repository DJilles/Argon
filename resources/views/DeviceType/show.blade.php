@extends('layouts.panel')
@section('title', 'Device/Show')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-eye"></i> Ver Dispositivo</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('devices_types.index') }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-arrow-left"></i> Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="heading-small text-muted mb-4">Datos del Dispositivo</h6>
                        <div class="pl-lg-4">
                            <label class="form-control-label" for="name"><i class="fas fa-signature"></i> Nombre</label>
                            <p>{{ $device_type->dev_name }}</p>

                            <label class="form-control-label" for="name"><i class="fas fa-graduation-cap"></i>
                                Descripción</label>
                            <p>{{ $device_type->dev_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
