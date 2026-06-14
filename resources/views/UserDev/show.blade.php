@extends('layouts.panel')
@section('title', 'UserDev/Show')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-eye"></i> Ver Usuarios-Préstamos</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('users_devs.index') }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-arrow-left"></i> Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="heading-small text-muted mb-4">Datos del usuario</h6>
                        <div class="pl-lg-4">
                            <label class="form-control-label" for="rol_completo"><i class="fas fa-signature"></i>Rol</label>
                            <p>{{ $user_dev->rol_completo}}</p>

                            <label class="form-control-label" for="u_name"><i class="fas fa-user"></i>
                                Nombre</label>
                            <p>{{ $user_dev->u_name}}</p>

                            <label class="form-control-label" for="surname"><i class="fas fa-user"></i>
                                Apellido</label>
                            <p>{{ $user_dev->surname}}</p>

                            <label class="form-control-label" for="gender_completo"><i class="fas fa-user"></i>
                                Género</label>
                            <p>{{ $user_dev->gender_completo}}</p>

                            <label class="form-control-label" for="career"><i class="fas fa-graduation-cap"></i>
                                Carrera o Área de trabajo</label>
                            <p>{{ $user_dev->career}}</p>

                            <label class="form-control-label" for="id_num"><i class="fas fa-graduation-cap"></i>
                                Número de Cédula</label>
                            <p>{{ $user_dev->id_num }}</p>

                            <label class="form-control-label" for="contact_num"><i class="fas fa-graduation-cap"></i>
                                Número de celular</label>
                            <p>{{ $user_dev->contact_num }}</p>

                            <label class="form-control-label" for="address"><i class="fas fa-graduation-cap"></i>
                                Dirección</label>
                            <p>{{ $user_dev->address }}</p>

                            <label class="form-control-label" for="check_out_date"><i class="fas fa-graduation-cap"></i>
                                Fecha de Salida</label>
                            <p>{{ $user_dev->check_out_date }}</p>

                            <label class="form-control-label" for="check_out_date"><i class="fas fa-graduation-cap"></i>
                                    Semestre</label>
                            <p>{{ $user_dev->semester_completo }}</p>

                            <label class="form-control-label" for="devolution_date_due"><i class="fas fa-graduation-cap"></i>
                                    Fecha y Hora de Devolución</label>
                            <p>{{ $user_dev->devolution_date_due}}</p>

                            <label class="form-control-label" for="device_condition"><i class="fas fa-graduation-cap"></i>
                                    Condición del dispositivo</label>
                            <p>{{ $user_dev->device_condition}}</p>

                            <label class="form-control-label" for="device_inventory_id"><i class="fas fa-graduation-cap"></i>
                                    Inventario</label>
                            <p>{{ $user_dev->device_inventory->inv_num}}</p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
