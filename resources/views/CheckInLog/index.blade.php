@extends('layouts.panel')
@section('title', 'Devoluciones')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Devoluciones de dispositivos</h3>
                        <a href="{{ route('check_in_logs.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Añadir devolución
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-list-ol"></i> ID</th>
                                <th scope="col"><i class="fas fa-user"></i> Fecha de devolución</th>
                                <th scope="col"><i class="fas fa-cubes"></i> Condición del equipo al devolverlo</th>
                                <th scope="col"><i class="fas fa-tags"></i> Nombre del Usuario</th>
                                <th scope="col"><i class="fas fa-tags"></i> Apellido del Usuario</th>
                                <th scope="col"><i class="fas fa-tags"></i> Cédula del Usuario</th>
                                <th scope="col"><i class="fas fa-tools"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($check_in_logs as $check_in_log)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $check_in_log->id }} </span>
                                    </td>
                                    <td>
                                        {{ $check_in_log->in_date }}
                                    </td>

                                    <td>
                                        {{ $check_in_log->return_condition }}
                                    </td>

                                    <td>
                                        {{ $check_in_log->user_dev->u_name }}
                                    </td>

                                    <td>
                                        {{ $check_in_log->user_dev->surname }}
                                    </td>

                                    <td>
                                        {{ $check_in_log->user_dev->id_num }}
                                    </td>


                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="{{ route('check_in_logs.show', $check_in_log) }}" class="btn btn-primary btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('check_in_logs.edit', $check_in_log) }}" class="btn btn-info btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('check_in_logs.destroy', $check_in_log->id) }}" method="POST"
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
