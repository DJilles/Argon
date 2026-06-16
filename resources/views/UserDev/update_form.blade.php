<h6 class="heading-small text-muted mb-4">Datos del nuevo usuario de préstamo</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="rol">Rol</label>
                <select name="rol" id="rol" class="form-control" required>
                    <option value="" disabled selected>-- Seleccione un rol --</option>
                    @foreach($roles as $key => $value)
                        <option value="{{ $key }}" {{ old('rol') == $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
             </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="u_name">Nombre</label>
                <input type="text" id="input-name" name="u_name" class="form-control form-control-alternative"
                    placeholder="Nombre" value="{{ old('u_name', $user_dev->u_name ?? '') }}">
            </div>

        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="surname">Apellido</label>
                <input type="text" id="input-name" name="surname" class="form-control form-control-alternative"
                    placeholder="Apellido" value="{{ old('surname', $user_dev->surname ?? '') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="gender">Género</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="" disabled selected>-- Seleccione su género --</option>
                    @foreach($gender as $key => $value)
                        <option value="{{ $key }}" {{ old('rol') == $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
             </select>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="career">Carrera o Área de trabajo</label>
                <input type="text" id="input-name" name="career" class="form-control form-control-alternative"
                    placeholder="Ingrese su carrera o Área de trabajo " value="{{ old('career', $user_dev->career ?? '') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="id_num">Número de Cédula</label>
                <input type="text" id="input-name" name="id_num" class="form-control form-control-alternative"
                    placeholder="Ingrese su cédula " value="{{ old('id_num', $user_dev->id_num ?? '') }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="contact_num">Número de celular</label>
                <input type="text" id="input-name" name="contact_num" class="form-control form-control-alternative"
                    placeholder="Ingrese su celular " value="{{ old('contact_num', $user_dev->contact_num ?? '') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <label class="form-control-label" for="address">Dirección</label>
                <textarea type="text" id="input-de" name="address" class="form-control form-control-alternative" placeholder="Añada su dirección">{{ old('address', $user_dev->address ?? '') }}</textarea>
        </div>

        <div class="form-group col-lg-6">
            <label for="check_out_date">Fecha de Salida (Hoy):</label>
                <input type="datetime-local"
                    name="check_out_date"
                    id="check_out_date"
                    class="form-control"
                    value="{{ now()->format('Y-m-d\TH:i') }}"
                    readonly>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="semester">Semestre</label>
                <select name="semester" id="semester" class="form-control" required>
                    <option value="" disabled selected>-- Seleccione su semestre --</option>
                    @foreach($semester as $key => $value)
                        <option value="{{ $key }}" {{ old('semester') == $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="devolution_date_due">Fecha y Hora de Devolución (Límite 6:00 PM):</label>
                <input type="datetime-local"
                    name="devolution_date_due"
                    id="devolution_date_due"
                    class="form-control"
                    value="{{ old('devolution_date_due', now()->setTime(18, 0)->format('Y-m-d\TH:i')) }}"
                    required>
            </div>

            <div class="col-lg-6">
                <label class="form-control-label" for="address">Condición del dispositivo</label>
                    <textarea type="text" id="input-de" name="device_condition" class="form-control form-control-alternative" placeholder="Añada la condición del dispositivo">{{ old('device_condition', $user_dev->device_condition ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <label class="form-control-label" for="type_id"><i class="fas fa-graduation-cap"></i> Inventario</label>
                <select name="device_inventory_id" id="device_inventory_id" class="form-control form-control-alternative">
                    <option disabled>Seleccionar una opción</option>
                    @foreach ($devices_inventories as $device_inventory)
                        <option value="{{ $device_inventory->id }}" @selected(old('inv_num', $device_inventory->id) == $device_inventory->id)>
                            {{$device_inventory->inv_num }}
                        </option>
                    @endforeach
                </select>
        </div>
    </div>

</div>
<!-- Extra -->

<hr class="my-4" />

<!-- SE AGREGA CONTRASEÑA POR MOTIVOS DE SEGURIDAD -->
<div class="form-group mt-3 col-lg-6">
    <label for="password_confirmation" class="form-control-label">Confirma tu contraseña para autorizar esta acción</label>
    <input type="password" name="password_confirmation" class="form-control" required placeholder="Escriba su contraseña">
    @error("password_confirmation")
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<!-- Contenido -->
<h6 class="heading-small text-muted mb-4">Guardar</h6>
<div class="pl-lg-4">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-sync"></i> Actualizar
        </button>
    </div>
</div>
