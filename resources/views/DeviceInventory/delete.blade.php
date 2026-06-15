@extends('layouts.app') @section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-danger">
                <div class="card-header bg-danger text-white">
                    <h4>⚠️ Confirmar Eliminación Crítica</h4>
                </div>
                <div class="card-body">
                    <p>Estás a punto de eliminar permanentemente el tipo de dispositivo:</p>
                    <blockquote class="blockquote bg-light p-3 rounded">
                        <strong>{{ $device_inventory->inv_num }}</strong> </blockquote>

                    <p class="text-muted text-sm">Para confirmar que eres tú y autorizar esta acción, por favor introduce tu contraseña actual:</p>

                    <form action="{{ route('devices_inventories.destroy', $device_inventory->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label">Contraseña de Usuario:</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required autofocus>

                            @error('password_confirmation')
                                <div class="invalid-feedback" style="color: red; display: block; margin-top: 5px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('devices_inventories.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-danger">Confirmar y Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
