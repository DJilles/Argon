<h6 class="heading-small text-muted mb-4">Datos del nuevo dispositivo</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="inv_num">Número de inventario</label>
                <input type="text" id="inv_num" name="inv_num" class="form-control form-control-alternative"
                    placeholder="Agregar número de inventario" value="{{ old('inv_num', $device_inventory->inv_num) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="serial_num">Número de serie</label>
                <input type="text" id="serial_num" name="serial_num" class="form-control form-control-alternative"
                    placeholder="Agregar número de serie" value="{{ old('serial_num', $device_inventory->serial_num) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="model">Modelo</label>
                <input type="text" id="model" name="model" class="form-control form-control-alternative"
                    placeholder="Agregar modelo" value="{{ old('model', $device_inventory->model) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="inv_condition">Condición</label>
                <textarea type="text" id="input-de" name="inv_condition" class="form-control form-control-alternative" placeholder="Añada una descripción de la condicion">{{ old('inv_condition', $device_inventory->inv_condition ?? '') }}</textarea>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="type_id"><i class="fas fa-graduation-cap"></i> Categoria</label>

                <select name="device_type_id" id="device_type_id" class="form-control form-control-alternative">
                    <option disabled>Seleccionar un Tipo</option>
                    @foreach ($devices_types as $device_type)
                        <option value="{{ $device_type->id }}" @selected(old('dev_name', $device_type->id) == $device_type->id)>
                            {{ $device_type->dev_name }}
                        </option>
                    @endforeach
                </select>

            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="type_id"><i class="fas fa-graduation-cap"></i> Marca</label>

                <select name="brand_id" id="brand_id" class="form-control form-control-alternative">
                    <option disabled>Seleccionar un Tipo</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" @selected(old('b_name', $brand->id) == $brand->id)>
                            {{ $brand->b_name }}
                        </option>
                    @endforeach
                </select>

            </div>
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
            <i class="fas fa-save"></i> Registrar
        </button>
    </div>
</div>
