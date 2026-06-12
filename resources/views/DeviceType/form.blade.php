<h6 class="heading-small text-muted mb-4">Datos Principales</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-name">Nombre</label>
                <input type="text" id="input-name" name="name" class="form-control form-control-alternative"
                    placeholder="Nombre" value="{{ old('name', $device_type->name ?? '') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-color">Descripción</label>
                <input type="text" id="input-color" name="color" class="form-control form-control-alternative"
                    placeholder="Añada una descripción" value="{{ old('dev_description', $device_type->dev_description ?? '') }}">
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
