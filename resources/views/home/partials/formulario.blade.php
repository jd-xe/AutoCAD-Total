<div class="form-container h-100 d-flex">
    <form class="align-items-center" id="form-container" wire:submit.prevent="submitRegistration">

        <h4 class=" mb-3" id="title-form">Regístrate con nosotros</h4>

        <div class="row w-100 justify-content-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombres</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        wire:model="name" placeholder="Ingresa tus nombres" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="apaterno" class="form-label">Apellido paterno</label>
                    <input type="text" class="form-control @error('lastName') is-invalid @enderror" id="lastName"
                        wire:model="lastName" placeholder="Apellido paterno" value="{{ old('apaterno') }}">
                    @error('apaterno')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="amaterno" class="form-label">Apellido materno</label>
                    <input type="text" class="form-control @error('amaterno') is-invalid @enderror" id="amaterno"
                        name="amaterno" placeholder="Apellido materno" value="{{ old('amaterno') }}">
                    @error('amaterno')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="emailRegister" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control @error('emailRegister') is-invalid @enderror"
                        id="emailRegister" name="emailRegister" placeholder="nombre@ejemplo.com"
                        value="{{ old('emailRegister') }}">
                    @error('emailRegister')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="tel" class="form-control @error('celular') is-invalid @enderror" id="celular"
                        name="celular" placeholder="Ingresa celular" value="{{ old('celular') }}">
                    @error('celular')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="dni" class="form-label">Dni</label>
                    <input type="number" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"
                        placeholder="Ingresa D.N.I" value="{{ old('dni') }}">
                    @error('dni')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion"
                        name="direccion" placeholder="Direccion" value="{{ old('direccion') }}">
                    @error('direccion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="fnacimiento" class="form-label">Fecha nacimiento</label>
                    <input type="date" class="form-control @error('fnacimiento') is-invalid @enderror" id="fnacimiento"
                        name="fnacimiento" value="{{ old('fnacimiento') }}">
                    @error('fnacimiento')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-12" id="politica-form">
                <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input @error('authorization1') is-invalid @enderror"
                        id="authorization1" name="authorization1" value="1" {{ old('authorization1') ? 'checked' : '' }}>
                    <label class="form-check-label" for="authorization1">
                        Autorizo el tratamiento de mis datos personales para finalidades informativas y comerciales,
                        conforme al <a href="{{ url('/') }}">enlace</a>. Sin mi autorización, no
                        podrán comunicarse conmigo.
                    </label>
                    @error('authorization1')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="authorization2" name="authorization2" value="1"
                        {{ old('authorization2') ? 'checked' : '' }}>
                    <label class="form-check-label" for="authorization2">
                        Opcionalmente, autorizo el tratamiento de mis datos personales para las finalidades comerciales
                        adicionales descritas en el siguiente <a href="{{ url('/') }}">enlace</a>.
                    </label>
                </div>
            </div>

            <div class="col-md-6 d-flex align-items-center justify-content-center" id="btn-register"
                style="padding-top: 10px;">
                <button type="submit" class="btn btn-primary w-50">
                    <i class="bi bi-send me-2"></i>Registrarse
                </button>
            </div>
        </div>
    </form>
</div>