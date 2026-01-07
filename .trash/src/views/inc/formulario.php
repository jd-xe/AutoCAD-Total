<div class="form-container h-100 d-flex">
    <form class="align-items-center" id="form-container" method="POST" action="<?=BASE_URL?>/usuario/registrar">
        <h4 class="mb-3" id="title-form">Regístrate con nosotros</h4>
        <div class="row w-100 justify-content-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa tus nombres">
                </div>
                <div class="mb-3">
                    <label for="apaterno" class="form-label">Apellido paterno</label>
                    <input type="text" class="form-control" id="apaterno" name="apaterno" placeholder="Apellido paterno ">
                </div>
                <div class="mb-3">
                    <label for="amaterno" class="form-label">Apellido materno</label>
                    <input type="text" class="form-control" id="amaterno" name="amaterno" placeholder="Apellido materno">
                </div>
                <div class="mb-3">
                    <label for="emailRegister" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="emailRegister" name="emailRegister" placeholder="nombre@ejemplo.com">
                </div>


            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="tel" class="form-control" id="celular" name="celular" placeholder="Ingresa celular">
                </div>
                <div class="mb-3">
                    <label for="dni" class="form-label">Dni</label>
                    <input type="number" class="form-control" id="dni" name="dni" placeholder="Ingresa D.N.I">
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
                </div>
                <div class="mb-3">
                    <label for="fnacimiento" class="form-label">Fecha nacimiento</label>
                    <input type="date" class="form-control" id="fnacimiento" name="fnacimiento">
                </div>
            </div>
            <div class="col-md-12" id="politica-form">
                <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" id="authorization1">
                    <label class="form-check-label" for="authorization1">
                        Autorizo el tratamiento de mis datos personales para finalidades informativas y comerciales, conforme al <a href="#">enlace</a>. Sin mi autorización, no podrán comunicarse conmigo.
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="authorization2">
                    <label class="form-check-label" for="authorization2">
                        Opcionalmente, autorizo el tratamiento de mis datos personales para las finalidades comerciales adicionales descritas en el siguiente <a href="#">enlace</a>.
                    </label>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center" id="btn-register" style="padding-top: 10px;">
                <button type="submit" class="btn btn-primary w-50"><i class="bi bi-send me-2"></i>Registrarse</button>
            </div>
        </div>
</div>
</form>
</div>