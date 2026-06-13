@extends('layouts.panel')
@section('title', 'Inventory/Show')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-eye"></i> Ver Inventario</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('devices_inventories.index') }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-arrow-left"></i> Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="heading-small text-muted mb-4">Datos en el Inventario</h6>
                        <div class="pl-lg-4">
                            <label class="form-control-label" for="inv_num"><i class="fas fa-signature"></i>Número</label>
                            <p>{{ $device_inventory->inv_num}}</p>

                            <label class="form-control-label" for="serial_num"><i class="fas fa-graduation-cap"></i>
                                Número de serie</label>
                            <p>{{ $device_inventory->serial_num}}</p>

                            <label class="form-control-label" for="model"><i class="fas fa-graduation-cap"></i>
                                Modelo</label>
                            <p>{{ $device_inventory->model}}</p>

                            <label class="form-control-label" for="inv_condition"><i class="fas fa-graduation-cap"></i>
                                Condición</label>
                            <p>{{ $device_inventory->inv_condition}}</p>

                            <label class="form-control-label" for="dev_name"><i class="fas fa-graduation-cap"></i>
                                Tipo de dispositivo</label>
                            <p>{{ $device_inventory->device_type->dev_name}}</p>

                            <label class="form-control-label" for="b_name"><i class="fas fa-graduation-cap"></i>
                                Marca</label>
                            <p>{{ $device_inventory->brand->b_name}}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
