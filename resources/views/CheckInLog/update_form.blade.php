<h6 class="heading-small text-muted mb-4">Datos de la devolución</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="in_date">Fecha y Hora de Devolución (Hoy):</label>
                <input type="datetime-local"
                    name="in_date"
                    id="check_out_date"
                    class="form-control"
                    value="{{ now()->format('Y-m-d\TH:i') }}"
                    readonly>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="return_condition">Condición de devolución</label>
                <textarea type="text" id="input-de" name="return_condition" class="form-control form-control-alternative" placeholder="Añada una descripción de la condicion">{{ old('return_condition', $check_in_log->return_condition ?? '') }}</textarea>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="type_id"><i class="fas fa-graduation-cap"></i> Cédula del Usuario</label>

                <select name="user_dev_id" id="user_dev_id" class="form-control form-control-alternative">
                    <option disabled>Seleccionar su Cédula</option>
                    @foreach ($users_devs as $user_dev)
                        <option value="{{ $user_dev->id }}" @selected(old('dev_name', $user_dev->id) == $user_dev->id)>
                            {{ $user_dev->id_num }}
                        </option>
                    @endforeach
                </select>

            </div>
        </div>

    </div>
</div>

<!-- Extra -->


<!-- SE AGREGA CONTRASEÑA POR MOTIVOS DE SEGURIDAD -->
<div class="form-group mt-3 col-lg-6">
    <label for="password_confirmation" class="form-control-label">Confirma tu contraseña para autorizar esta acción</label>
    <input type="password" name="password_confirmation" class="form-control" required placeholder="Escriba su contraseña">
    @error("password_confirmation")
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<hr class="my-4" />
<!-- Contenido -->
<h6 class="heading-small text-muted mb-4">Guardar</h6>
<div class="pl-lg-4">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-sync"></i> Actualizar devolución
        </button>
    </div>
</div>
