<div class="container py-4">
    <h1 class="mb-4">Mi Perfil</h1>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(!$editing)
        <dl class="row">
            <dt class="col-sm-3">Nombre</dt>
            <dd class="col-sm-9">{{ $first_name }} {{ $last_name }}</dd>
            <dt class="col-sm-3">DNI</dt>
            <dd class="col-sm-9">{{ $dni }}</dd>
            <dt class="col-sm-3">Fecha Nac.</dt>
            <dd class="col-sm-9">{{ $birth_date }}</dd>
            <dt class="col-sm-3">Teléfono</dt>
            <dd class="col-sm-9">{{ $phone }}</dd>
            <dt class="col-sm-3">Dirección</dt>
            <dd class="col-sm-9">{{ $address }}</dd>
            <!-- resto de campos… -->
        </dl>
        <button wire:click="startEditing" class="btn btn-primary">Editar Perfil</button>
        <a href="{{ route('student.profile.password.edit') }}" class="btn btn-outline-secondary">Cambiar Contraseña</a>
    @else
        <form wire:submit.prevent="updateProfile">

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="first_name" class="form-label">Nombre</label>
                    <input wire:model.defer="first_name" type="text" id="first_name"
                        class="form-control @error('first_name') is-invalid @enderror">
                    @error('first_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="last_name" class="form-label">Apellido</label>
                    <input wire:model.defer="last_name" type="text" id="last_name"
                        class="form-control @error('last_name') is-invalid @enderror">
                    @error('last_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="dni" class="form-label">DNI</label>
                    <input wire:model.defer="dni" type="text" id="dni"
                        class="form-control @error('dni') is-invalid @enderror">
                    @error('dni')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
                    <input wire:model.defer="birth_date" type="date" id="birth_date"
                        class="form-control @error('birth_date') is-invalid @enderror">
                    @error('birth_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input wire:model.defer="phone" type="text" id="phone"
                        class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="address" class="form-label">Dirección</label>
                    <input wire:model.defer="address" type="text" id="address"
                        class="form-control @error('address') is-invalid @enderror">
                    @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-accent">Actualizar Perfil</button>
                <a href="{{ route('student.profile.password.edit') }}" class="btn btn-outline-light ms-2">
                    Cambiar Contraseña
                </a>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-accent">Guardar</button>
                <button type="button" wire:click="cancelEditing" class="btn btn-secondary ms-2">Cancelar</button>
            </div>
        </form>
    @endif

    <form wire:submit.prevent="updateProfile">

    </form>
</div>