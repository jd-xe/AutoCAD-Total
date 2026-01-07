<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

new class extends Component {
    // Propiedades vinculadas al formulario
    public string $first_name = '';
    public string $last_name = '';
    public string $mother_last_name = '';
    public string $dni = '';
    public string $email = '';
    public string $phone = '';
    public string $birth_date = '';
    public string $address = '';
    public bool $authorization1 = false;
    
    public ?int $courseId = null;
    
    public function mount()
    {
        $routeName = request()->route()->getName();

        // Asigna automáticamente según la ruta
        $this->courseId = match ($routeName) {
            'curso.basico' => 1,
            'curso.intermedio' => 2,
            'curso.avanzado' => 3,
            default => 1,
        };
    }

    public function register()
    {
        $data = $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mother_last_name' => 'required|string|max:255',
            'dni' => 'required|digits:8|unique:users,dni',
            'email' => 'required|email|max:150|unique:users,email',
            'phone' => ['required', 'digits:9', 'regex:/^9\d{8}$/'],
            'birth_date' => 'required|date',
            'address' => 'required|string|max:255',
            'authorization1' => 'accepted',
        ], [
            'authorization1.accepted' => 'Debes autorizar el tratamiento de tus datos personales.',
        ]);

        DB::beginTransaction();
        try {
            $user = \App\Models\User::create([
                'first_name' => $this->first_name,
                'last_name' => trim($this->last_name . ' ' . $this->mother_last_name),
                'dni' => $this->dni,
                'email' => $this->email,
                'phone' => $this->phone,
                'birth_date' => $this->birth_date,
                'address' => $this->address,
            ]);

            $token = Str::random(64);
            \App\Models\EmailVerification::create([
                'user_id' => $user->id,
                'token' => $token,
                'expires_at' => now()->addHours(24),
            ]);

            #Mail::to($user->email)->send(new \App\Mail\VerifyEmail($user->first_name . ' ' . $user->last_name, $token));
            Mail::to($user->email)->send(new \App\Mail\VerifyEmail(
                $user->first_name . ' ' . $user->last_name,
                $token,
                $this->courseId,
            ));

            DB::commit();

            session()->flash('success', 'Tu cuenta ha sido registrada. Revisa tu correo para confirmar.');

            return redirect()->route('home');
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error('Error en registro: ' . $e->getMessage());
            $this->addError('general', 'Ocurrió un error inesperado. Inténtalo más tarde.');
        }
    }
}; ?>

<div class="glass-form-container">
    <form wire:submit.prevent="register">
        <h4 id="title-form">
            <i class="bi bi-person-plus-fill me-2"></i>Regístrate con nosotros
        </h4>

        <div class="row g-3"> <!-- g-3 da espaciado inteligente entre columnas -->
            
            <!-- Columna Izquierda del Form -->
            <div class="col-md-6">
                <div class="mb-2">
                    <label class="form-label">Nombres</label>
                    <input type="text" class="form-control glass-input @error('first_name') is-invalid @enderror"
                        placeholder="Tus nombres" wire:model="first_name">
                    @error('first_name') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-2">
                    <label class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control glass-input @error('last_name') is-invalid @enderror"
                        placeholder="Apellido paterno" wire:model="last_name">
                    @error('last_name') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-2">
                    <label class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control glass-input @error('mother_last_name') is-invalid @enderror"
                        placeholder="Apellido materno" wire:model="mother_last_name">
                    @error('mother_last_name') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-2">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control glass-input @error('email') is-invalid @enderror"
                        placeholder="nombre@ejemplo.com" wire:model="email">
                    @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Columna Derecha del Form -->
            <div class="col-md-6">
                <div class="mb-2">
                    <label class="form-label">Celular</label>
                    <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="9"
                        class="form-control glass-input @error('phone') is-invalid @enderror" 
                        placeholder="999 999 999" wire:model="phone">
                    @error('phone') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-2">
                    <label class="form-label">DNI</label>
                    <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="8"
                        class="form-control glass-input @error('dni') is-invalid @enderror" 
                        placeholder="8 dígitos" wire:model="dni">
                    @error('dni') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-2">
                    <label class="form-label">Dirección</label>
                    <input type="text" class="form-control glass-input @error('address') is-invalid @enderror"
                        placeholder="Av. Principal 123" wire:model="address">
                    @error('address') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-2">
                    <label class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control glass-input @error('birth_date') is-invalid @enderror"
                        wire:model="birth_date">
                    @error('birth_date') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Políticas -->
            <div class="col-12 mt-3">
                <div class="form-check mb-2">
                    <input type="checkbox" id="authorization1" class="form-check-input" wire:model="authorization1">
                    <label class="form-check-label text-white small" for="authorization1">
                        Autorizo el tratamiento de mis datos personales. <a href="#">Ver política</a>.
                    </label>
                    @error('authorization1') <div class="text-danger small d-block">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-check">
                    <input type="checkbox" id="authorization2" class="form-check-input" wire:model="authorization2">
                    <label class="form-check-label text-white small" for="authorization2">
                        Autorizo fines comerciales opcionales.
                    </label>
                </div>
            </div>

            <!-- Botón -->
            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-warning w-100 py-2 fw-bold" style="border-radius: 50px;">
                    <i class="bi bi-rocket-takeoff-fill me-2"></i> ¡Registrarme Ahora!
                </button>
            </div>
        </div>
    </form>
</div>