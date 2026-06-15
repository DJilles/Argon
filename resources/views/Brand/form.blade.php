<h6 class="heading-small text-muted mb-4">Datos Principales</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="b_name">Nombre</label>
                <input type="text" id="input-name" name="b_name" class="form-control form-control-alternative"
                    placeholder="Nombre de la marca" value="{{ old('b_name', $brand->b_name ?? '') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="b_description">Descripción</label>
                <textarea type="text" id="input-de" name="b_description" class="form-control form-control-alternative" placeholder="Añada una descripción">{{ old('b_description',$brand->b_description ?? '') }}</textarea>
            </div>
        </div>
    </div>
</div>
<!-- Address -->


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
