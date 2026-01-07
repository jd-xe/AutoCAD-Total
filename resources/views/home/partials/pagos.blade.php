@extends('components.layouts.welcome')

@section('title', 'Guía de Pagos | AMISAM')

@section('content')
<div class="container py-5 mt-5">
    
    {{-- ENCABEZADO --}}
    <div class="text-center mb-5" data-aos="fade-down">
        <h1 class="display-4 fw-bold text-white">Inscripción y Pagos</h1>
        <p class="text-white-50 fs-5">Selecciona tu curso y el método de pago de tu preferencia.</p>
    </div>

    {{-- ========================================== --}}
    {{-- SECCIÓN 1: PRECIOS DE CURSOS (PREMIUM CARDS) --}}
    {{-- ========================================== --}}
    @if(isset($courses) && count($courses) > 0)
        <div class="row justify-content-center g-4 mb-5">
            @foreach($courses as $course)
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                {{-- Tarjeta con efecto Glassmorphism mejorado --}}
                <div class="card h-100 border-0 position-relative overflow-hidden shadow-lg" 
                     style="background: linear-gradient(145deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05)); backdrop-filter: blur(20px); border-radius: 20px; border: 1px solid rgba(255,255,255,0.2); transition: all 0.3s ease;">
                    
                    {{-- Badge decorativo --}}
                    <div class="position-absolute top-0 end-0 bg-warning text-dark fw-bold px-3 py-1 rounded-bottom-start" style="font-size: 0.75rem;">
                        DISPONIBLE
                    </div>

                    <div class="card-body p-4 d-flex flex-column text-center">
                        <div class="mb-3">
                            <i class="bi bi-mortarboard-fill text-white opacity-75 display-4"></i>
                        </div>
                        
                        {{-- Título del curso --}}
                        <h5 class="card-title text-white fw-bold text-uppercase mb-3" style="letter-spacing: 1px; min-height: 3rem; display: flex; align-items: center; justify-content: center;">
                            {{ $course->name }}
                        </h5>

                        {{-- Precio --}}
                        <div class="my-3 py-3 rounded-4" style="background: rgba(0,0,0,0.2);">
                            <span class="text-white-50 small d-block mb-0">Inversión Única</span>
                            <span class="display-6 fw-bold text-white">S/ {{ number_format($course->amount, 0) }}</span>
                            <span class="text-white fs-5 align-top">.{{ explode('.', number_format($course->amount, 2))[1] }}</span>
                        </div>

                        {{-- Botón de Acción Directa --}}
                        <div class="mt-auto">
                            <a href="https://wa.me/51940277254?text=Hola,%20estoy%20interesado%20en%20el%20curso%20*{{ urlencode($course->name) }}*%20de%20S/%20{{ $course->amount }}.%20%C2%BFMe%20podr%C3%ADan%20dar%20m%C3%A1s%20detalles%20para%20pagar?" 
                               target="_blank"
                               class="btn btn-outline-light w-100 rounded-pill fw-bold hover-scale">
                                <i class="bi bi-whatsapp me-2"></i> Pagar ahora
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Separador Visual --}}
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="d-inline-block p-2 rounded-circle border border-white border-opacity-25 text-white-50">
                <i class="bi bi-arrow-down"></i>
            </span>
            <p class="text-white-50 mt-2 small">Utiliza las cuentas de abajo para realizar tu depósito</p>
        </div>
    @endif


    {{-- ========================================== --}}
    {{-- SECCIÓN 2: MÉTODOS DE PAGO (SOLO YAPE Y BCP) --}}
    {{-- ========================================== --}}
    <div class="row justify-content-center g-4">
        
        {{-- YAPE --}}
        <div class="col-md-6 col-lg-5" data-aos="fade-right" data-aos-delay="0">
            <div class="card h-100 text-center border-0 hover-lift" style="background: rgba(45, 10, 78, 0.6); backdrop-filter: blur(10px); border-radius: 20px; border: 1px solid rgba(255,255,255,0.1);">
                <div class="card-body p-4 p-lg-5"> {{-- Padding extra para mejor presencia --}}
                    <div class="mb-3 p-3 bg-white rounded-circle d-inline-block shadow-sm">
                        <h4 class="m-0 fw-bold" style="color: #742284;">Yape</h4>
                    </div>
                    <h3 class="text-white fw-bold mb-3">YAPE BCP</h3>
                    
                    <div class="bg-white p-2 mx-auto mb-3 rounded shadow-sm" style="width: 220px; height: 220px;">
                        <img src="{{ asset('img/qr_yape.PNG') }}" alt="QR Yape" class="w-100 h-100" style="object-fit: contain;">
                    </div>

                    <h4 class="text-white mb-1 tracking-wider display-6 fw-bold">923 790 451</h4>
                    <p class="text-white-50">A nombre de: Amina Esp.</p>
                </div>
            </div>
        </div>

        {{-- BCP / TRANSFERENCIA --}}
        <div class="col-md-6 col-lg-5" data-aos="fade-left" data-aos-delay="100">
            <div class="card h-100 text-center border-0 hover-lift" style="background: rgba(255, 120, 0, 0.2); backdrop-filter: blur(10px); border-radius: 20px; border: 1px solid rgba(255,255,255,0.1);">
                <div class="card-body p-4 p-lg-5 d-flex flex-column justify-content-center">
                    <div class="mb-4">
                        <div class="mb-3 p-3 bg-white rounded-circle d-inline-block shadow-sm">
                            <h4 class="m-0 fw-bold" style="color: #ff7800;">BCP</h4>
                        </div>
                        <h3 class="text-white fw-bold">Transferencia</h3>
                    </div>
                    
                    <div class="text-start p-3 p-md-4 rounded mb-3 border border-white border-opacity-10" style="background: rgba(0,0,0,0.3);">
                        <p class="text-white-50 mb-1 small text-uppercase fw-bold">Cuenta Corriente:</p>
                        <h4 class="text-white text-break font-monospace mb-0">33510416348080</h4>
                    </div>

                    <div class="text-start p-3 p-md-4 rounded border border-white border-opacity-10" style="background: rgba(0,0,0,0.3);">
                        <p class="text-white-50 mb-1 small text-uppercase fw-bold">Cuenta Interbancaria (CCI):</p>
                        <h5 class="text-white text-break font-monospace mb-0">00233511041634808088</h5>
                    </div>

                    <p class="text-white-50 small mt-4 mb-0">A nombre de: Amina Esp.</p>
                </div>
            </div>
        </div>

    </div>

    {{-- BOTÓN GLOBAL INFERIOR --}}
    <div class="text-center mt-5 pt-4">
        <h4 class="text-white mb-4">¿Ya realizaste el pago?</h4>
        <a href="https://wa.me/51940277254?text=Hola,%20ya%20realicé%20el%20pago%20del%20curso,%20envío%20adjunto%20el%20comprobante." target="_blank" class="btn btn-success btn-lg rounded-pill px-5 py-3 fw-bold shadow-lg hover-scale">
            <i class="bi bi-file-earmark-check me-2"></i> Enviar Comprobante
        </a>
    </div>

</div>

{{-- Estilos adicionales para esta vista --}}
@push('styles')
<style>
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.3);
    }
    .hover-scale:hover {
        transform: scale(1.05);
        transition: transform 0.2s;
    }
    /* Mejora de legibilidad en monospace */
    .font-monospace {
        letter-spacing: 1px;
    }
</style>
@endpush

<footer>@include('home.partials.footer')</footer>
@endsection