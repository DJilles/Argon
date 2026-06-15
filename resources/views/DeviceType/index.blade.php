@extends('layouts.panel')
@section('title', 'Tipo de dispositivo')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Tipos de dispositivos</h3>
                        <a href="{{ route('devices_types.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nuevo tipo
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-list-ol"></i> ID</th>
                                <th scope="col"><i class="fas fa-user"></i> Nombre</th>
                                <th scope="col"><i class="fas fa-cubes"></i> Descripción</th>
                                <th scope="col"><i class="fas fa-tools"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($devices_types as $device_type)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $device_type->id }} </span>
                                    </td>
                                    <td>
                                        {{ $device_type->dev_name }}
                                    </td>

                                    <td>
                                        {{ $device_type->dev_description }}
                                    </td>

                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="{{ route('devices_types.show', $device_type) }}" class="btn btn-primary btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('devices_types.edit', $device_type) }}" class="btn btn-info btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <a href="{{ route('devices_types.delete', $device_type->id) }}" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav aria-label="..." class="d-flex flex-wrap justify-content-center justify-content-lg-start">

                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection



