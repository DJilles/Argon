@extends('layouts.panel')
@section('title', 'Inventario')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Inventario de Dispositivos</h3>
                        <a href="{{ route('devices_inventories.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Añadir algo al inventario
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-list-ol"></i> ID</th>
                                <th scope="col"><i class="fas fa-user"></i> Número de inventario</th>
                                <th scope="col"><i class="fas fa-cubes"></i> Número de serie</th>
                                <th scope="col"><i class="fas fa-tags"></i> Modelo</th>
                                <th scope="col"><i class="fas fa-tags"></i> Condición</th>
                                <th scope="col"><i class="fas fa-tags"></i> Tipo</th>
                                <th scope="col"><i class="fas fa-tags"></i> Marca</th>
                                <th scope="col"><i class="fas fa-tools"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($devices_inventories as $device_inventory)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $device_inventory->id }} </span>
                                    </td>
                                    <td>
                                        {{ $device_inventory->inv_num }}
                                    </td>

                                    <td>
                                        {{ $device_inventory->serial_num }}
                                    </td>

                                    <td>
                                        {{ $device_inventory->model }}
                                    </td>

                                    <td>
                                        {{ $device_inventory->inv_condition }}
                                    </td>

                                    <td>
                                        {{ $device_inventory->device_type->dev_name }}
                                    </td>

                                    <td>
                                        {{ $device_inventory->brand->b_name}}
                                    </td>

                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="{{ route('devices_inventories.show', $device_inventory) }}" class="btn btn-primary btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('devices_inventories.edit', $device_inventory) }}" class="btn btn-info btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('devices_inventories.destroy', $device_inventory->id) }}" method="POST"
                                            style="display: inline-block; margin: 0; display: flex; align-items: center;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
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
