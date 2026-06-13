<h6 class="heading-small text-muted mb-4">Datos Principales</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="dev_name">Nombre</label>
                <input type="text" id="input-name" name="dev_name" class="form-control form-control-alternative"
                    placeholder="Nombre" value="{{ old('dev_name', $device_type->dev_name ?? '') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="dev_description">Descripción</label>
                <textarea type="text" id="input-de" name="dev_description" class="form-control form-control-alternative" placeholder="Añada una descripción">{{ old('dev_description', $device_type->dev_description ?? '') }}</textarea>
            </div>
        </div>
    </div>
</div>
<hr class="my-4" />
<!-- Address -->
<hr class="my-4" />
<!-- Contenido -->
<h6 class="heading-small text-muted mb-4">Guardar</h6>
<div class="pl-lg-4">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Registrar
        </button>
    </div>
</div>
