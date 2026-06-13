@extends('layouts.panel')
@section('title', 'Usuarios')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Usuarios (Préstamos)</h3>
                        <a href="{{ route('users_devs.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Añadir usuario-préstamo
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-list-ol"></i> ID</th>
                                <th scope="col"><i class="fas fa-user"></i> Rol</th>
                                <th scope="col"><i class="fas fa-cubes"></i>Nombre(s)</th>
                                <th scope="col"><i class="fas fa-tags"></i> Apellido(s)</th>
                                <th scope="col"><i class="fas fa-tags"></i>Género</th>
                                <th scope="col"><i class="fas fa-tags"></i>Carrera técnica</th>
                                <th scope="col"><i class="fas fa-tags"></i> Cédula</th>
                                <th scope="col"><i class="fas fa-tags"></i>Celular</th>
                                <th scope="col"><i class="fas fa-tags"></i>Dirección</th>
                                <th scope="col"><i class="fas fa-tags"></i>Día del préstamo</th>
                                <th scope="col"><i class="fas fa-tags"></i>Semestre</th>
                                <th scope="col"><i class="fas fa-tags"></i>Fecha prevista de devolución</th>
                                <th scope="col"><i class="fas fa-tags"></i>Condición del equipo en el préstamo</th>
                                <th scope="col"><i class="fas fa-tags"></i>Numero de inventario</th>
                                <th scope="col"><i class="fas fa-tools"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users_devs as $user_dev)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $user_dev->id }} </span>
                                    </td>
                                    <td>
                                        {{ $user_dev->rol }}
                                    </td>

                                    <td>
                                        {{ $user_dev->u_name }}
                                    </td>

                                    <td>
                                        {{ $user_dev->surname }}
                                    </td>

                                    <td>
                                        {{ $user_dev->gender }}
                                    </td>

                                    <td>
                                        {{ $user_dev->career }}
                                    </td>

                                    <td>
                                        {{ $user_dev->id_num}}
                                    </td>

                                    <td>
                                        {{ $user_dev->contact_num}}
                                    </td>

                                    <td>
                                        {{ $user_dev->address}}
                                    </td>

                                    <td>
                                        {{ $user_dev->check_out_date}}
                                    </td>

                                     <td>
                                        {{ $user_dev->semester}}
                                    </td>

                                     <td>
                                        {{ $user_dev->devolution_date_due}}
                                    </td>

                                     <td>
                                        {{ $user_dev->device_condition}}
                                    </td>

                                     <td>
                                        {{ $user_dev->device_inventory->inv_num}}
                                    </td>

                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="{{ route('users_devs.show', $user_dev) }}" class="btn btn-primary btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('users_devs.edit', $user_dev) }}" class="btn btn-info btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('users_devs.destroy', $user_dev->id) }}" method="POST"
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
