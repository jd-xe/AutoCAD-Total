@extends('components.layouts.welcome')

@section('title', 'Contáctanos | AMISAM')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@section('content')

<div id="cnt-page-wrapper">
    
    <!-- Encabezado -->
    <div class="container pt-5 pb-4 text-center" data-aos="fade-down">
        <h5 class="text-primary text-uppercase ls-2">Atención al Estudiante</h5>
        <h1 class="display-4 fw-bold text-white">Estamos aquí para ayudarte</h1>
        <p class="text-white-50 lead">¿Tienes dudas sobre los cursos o certificaciones? Escríbenos.</p>
    </div>

    <div class="container pb-5">
        <div class="row g-5">
            
            <!-- Columna Izquierda: Información y Mapa -->
            <div class="col-lg-5" data-aos="fade-right">
                <div class="cnt-info-card h-100">
                    
                    <div class="cnt-info-item mb-4">
                        <div class="cnt-icon-wrapper">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div>
                            <h5 class="text-white fw-bold mb-1">Visítanos</h5>
                            <p class="text-white-50 mb-0">Av. Salaverry 238<br>Huacho, Perú</p>
                        </div>
                    </div>

                    <div class="cnt-info-item mb-4">
                        <div class="cnt-icon-wrapper">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div>
                            <h5 class="text-white fw-bold mb-1">Correo Electrónico</h5>
                            <p class="text-white-50 mb-0">soporte@autocadtotal.com</p>
                            <p class="text-white-50 mb-0">ventas@autocadtotal.com</p>
                        </div>
                    </div>

                    <div class="cnt-info-item mb-4">
                        <div class="cnt-icon-wrapper">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div>
                            <h5 class="text-white fw-bold mb-1">Llámanos / WhatsApp</h5>
                            <p class="text-white-50 mb-0">+51 940 277 254</p>
                            <small class="text-success">Disponible ahora</small>
                        </div>
                    </div>

                    <!-- Mapa Embed (Huacho) -->
                    <div class="cnt-map-container mt-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3907.646264903543!2d-77.6107672243276!3d-11.11156408905865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9106df99a60e5991%3A0x636952306563033!2sHuacho!5e0!3m2!1ses!2spe!4v1709123456789!5m2!1ses!2spe" 
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>
            </div>

            <!-- Columna Derecha: Formulario -->
            <div class="col-lg-7" data-aos="fade-left">
                <div class="cnt-form-card">
                    <h3 class="text-white fw-bold mb-4">Envíanos un mensaje</h3>
                    
                    <!-- Formulario -->
                    <form action="{{ route('contacto.send') }}" method="POST">
                        @csrf  {{-- Token de seguridad obligatorio --}}
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-white-50">Nombres <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text cnt-glass-icon"><i class="bi bi-person"></i></span>
                                    {{-- Agregado name="name" y required --}}
                                    <input type="text" name="name" class="form-control cnt-glass-input" placeholder="Tu nombre" required value="{{ old('name') }}">
                                </div>
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                    
                            <div class="col-md-6">
                                <label class="form-label text-white-50">Apellidos <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text cnt-glass-icon"><i class="bi bi-person"></i></span>
                                    {{-- Agregado name="lastname" y required --}}
                                    <input type="text" name="lastname" class="form-control cnt-glass-input" placeholder="Tus apellidos" required value="{{ old('lastname') }}">
                                </div>
                                @error('lastname') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label text-white-50">Correo <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text cnt-glass-icon"><i class="bi bi-envelope"></i></span>
                                    {{-- Agregado name="email" y type email --}}
                                    <input type="email" name="email" class="form-control cnt-glass-input" placeholder="nombre@ejemplo.com" required value="{{ old('email') }}">
                                </div>
                                @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                    
                            <div class="col-md-6">
                                <label class="form-label text-white-50">Celular</label>
                                <div class="input-group">
                                    <span class="input-group-text cnt-glass-icon"><i class="bi bi-whatsapp"></i></span>
                                    {{-- Agregado name="phone" --}}
                                    <input type="tel" name="phone" class="form-control cnt-glass-input" placeholder="999 999 999" value="{{ old('phone') }}">
                                </div>
                            </div>
                    
                            <div class="col-12">
                                <label class="form-label text-white-50">Asunto <span class="text-danger">*</span></label>
                                {{-- Agregado name="subject" y values reales --}}
                                <select name="subject" class="form-select cnt-glass-input" required>
                                    <option value="Consulta General">Consulta General</option>
                                    <option value="Soporte Técnico">Soporte Técnico</option>
                                    <option value="Pagos y Facturación">Pagos y Facturación</option>
                                    <option value="Informes Corporativos">Informes Corporativos</option>
                                </select>
                            </div>
                    
                            <div class="col-12">
                                <label class="form-label text-white-50">Mensaje <span class="text-danger">*</span></label>
                                {{-- Agregado name="message" --}}
                                <textarea name="message" class="form-control cnt-glass-input" rows="4" placeholder="¿En qué podemos ayudarte?" required>{{ old('message') }}</textarea>
                                @error('message') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                    
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold" style="background: linear-gradient(135deg, #4f46e5, #7c3aed); border:none;">
                                    <i class="bi bi-send-fill me-2"></i> Enviar Mensaje
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
    {{-- CDN de SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Verificamos si hay un mensaje de sesión 'success' desde el controlador
        @if(session('contact_success'))
            Swal.fire({
                icon: 'success',
                title: '¡Mensaje Enviado!',
                text: "{{ session('success') }}",
                background: 'rgba(20, 20, 35, 0.95)', // Fondo oscuro estilo Glass
                color: '#fff', // Texto blanco
                confirmButtonColor: '#4f46e5', // Tu color primario (índigo)
                confirmButtonText: 'Genial',
                backdrop: `
                    rgba(0,0,123,0.1)
                `,
                customClass: {
                    popup: 'border border-white border-opacity-10 rounded-4 shadow-lg'
                }
            });
        @endif

        // Opcional: Manejo de errores de validación visual
        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Atención',
                text: 'Por favor verifica los campos marcados en rojo.',
                background: 'rgba(20, 20, 35, 0.95)',
                color: '#fff',
                confirmButtonColor: '#dc3545'
            });
        @endif
    </script>
@endpush

@include('home.partials.footer')
@endsection