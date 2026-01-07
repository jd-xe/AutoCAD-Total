<?php

use Livewire\Volt\Component;

new class extends Component {

    public string $email = '';
    public string $password = '';
    public string $error = '';

    /*
     * Maneja el intento de login
     */
    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (
            Auth::guard('web')->attempt([
                'email' => $this->email,
                'password' => $this->password
            ])
        ) {
            session()->regenerate();

            $user = Auth::guard('web')->user();

            return match (true) {
                $user->hasRole('admin') => redirect()->route('admin.dashboard'),
                $user->hasRole('student') => redirect()->route('student.dashboard'),
                #$user->hasRole('teacher') => redirect()->route('teacher.dashboard'),
                default => redirect()->intended('/'),
            };
        }
        $this->error = 'Las credenciales son incorrectas.';
        $this->dispatch('loginFailed');
    }
}; ?>

<!-- Modal para iniciar sesión -->
<div wire:ignore.self class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img id="rotating-logo" src="{{ asset('img/amisam.png') }}" alt="Logo AMISAM"
                    class="d-inline-block align-text-top">
                <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="login">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            wire:model.defer="email" placeholder="nombre@ejemplo.com" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            wire:model.defer="password" placeholder="Contraseña" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if($error)
                        <div class="text-danger mb-3">{{ $error }}</div>
                    @endif

                    <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('loginFailed', () => {
                const modalElement = document.getElementById('loginModal');
                const modal = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                modal.show();
            });
        });
    </script>
@endpush