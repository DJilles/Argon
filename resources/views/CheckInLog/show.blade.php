@extends('layouts.panel')
@section('title', 'Log/Show')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-eye"></i> Ver Devoluciones</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('check_in_logs.index') }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-arrow-left"></i> Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="heading-small text-muted mb-4">Datos de la devolución</h6>
                        <div class="pl-lg-4">
                            <label class="form-control-label" for="in_date"><i class="fas fa-signature"></i>Fecha de devolución</label>
                            <p>{{ $check_in_log->in_date}}</p>

                            <label class="form-control-label" for="serial_num"><i class="fas fa-graduation-cap"></i>
                                Condición del equipo al devolverlo</label>
                            <p>{{ $check_in_log->return_condition}}</p>

                            <label class="form-control-label" for="model"><i class="fas fa-graduation-cap"></i>
                                Equipo</label>
                            <p>{{ $check_in_log->user_dev->device_inventory->model}}</p>

                            <label class="form-control-label" for="inv_num"><i class="fas fa-graduation-cap"></i>
                                Número de inventario</label>
                            <p>{{ $check_in_log->user_dev->device_inventory->inv_num}}</p>

                            <label class="form-control-label" for="u_name"><i class="fas fa-graduation-cap"></i>
                                Nombre del usuario</label>
                            <p>{{ $check_in_log->user_dev->u_name}}</p>

                            <label class="form-control-label" for="surname"><i class="fas fa-graduation-cap"></i>
                                Apellido del usuario</label>
                            <p>{{ $check_in_log->user_dev->surname}}</p>

                            <label class="form-control-label" for="dev_name"><i class="fas fa-graduation-cap"></i>
                                Cédula del usuario</label>
                            <p>{{ $check_in_log->user_dev->id_num}}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
