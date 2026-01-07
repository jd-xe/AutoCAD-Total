@extends('components.layouts.welcome')

@section('title', 'Eventos y Actividades | AMISAM')

@section('content')
<div class="container py-5 mt-5">
    
    <div class="text-center mb-5" data-aos="fade-down">
        <h5 class="text-warning text-uppercase ls-2">Agenda Académica</h5>
        <h1 class="display-4 fw-bold text-white">Próximos Eventos y Talleres</h1>
        <p class="text-white-50">Capacitaciones gratuitas y exclusivas para nuestra comunidad</p>
    </div>

    <div class="row g-4">
        <!-- Evento 1 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
            <div class="card h-100 border-0" style="background: rgba(30,41,59,0.6); backdrop-filter: blur(10px); border-radius: 20px; border: 1px solid rgba(255,255,255,0.1); overflow: hidden;">
                <div class="position-relative">
                    <!-- Placeholder de imagen -->
                    <div style="height: 200px; background: linear-gradient(135deg, #1e293b, #0f172a); display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-camera-video text-white-50" style="font-size: 4rem;"></i>
                    </div>
                    <span class="badge bg-danger position-absolute top-0 end-0 m-3">EN VIVO</span>
                </div>
                <div class="card-body p-4">
                    <small class="text-primary fw-bold">📅 Sábado 28 Oct, 7:00 PM</small>
                    <h4 class="text-white fw-bold mt-2 mb-3">Masterclass: Novedades AutoCAD 2025</h4>
                    <p class="text-white-50 small">Descubre las herramientas de Inteligencia Artificial integradas en la última versión y cómo agilizan tu flujo de trabajo.</p>
                    <a href="#" class="btn btn-outline-light w-100 rounded-pill mt-2">Registrarme Gratis</a>
                </div>
            </div>
        </div>

        <!-- Evento 2 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card h-100 border-0" style="background: rgba(30,41,59,0.6); backdrop-filter: blur(10px); border-radius: 20px; border: 1px solid rgba(255,255,255,0.1); overflow: hidden;">
                <div class="position-relative">
                    <div style="height: 200px; background: linear-gradient(135deg, #1e293b, #334155); display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-gear-wide-connected text-white-50" style="font-size: 4rem;"></i>
                    </div>
                    <span class="badge bg-info text-dark position-absolute top-0 end-0 m-3">TALLER</span>
                </div>
                <div class="card-body p-4">
                    <small class="text-primary fw-bold">📅 Jueves 02 Nov, 8:00 PM</small>
                    <h4 class="text-white fw-bold mt-2 mb-3">Taller Práctico: Bloques Dinámicos</h4>
                    <p class="text-white-50 small">Aprende a crear bloques inteligentes que se adaptan a diferentes medidas y escalas automáticamente.</p>
                    <a href="#" class="btn btn-outline-light w-100 rounded-pill mt-2">Reservar Cupo</a>
                </div>
            </div>
        </div>

        <!-- Evento 3 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card h-100 border-0" style="background: rgba(30,41,59,0.6); backdrop-filter: blur(10px); border-radius: 20px; border: 1px solid rgba(255,255,255,0.1); overflow: hidden;">
                <div class="position-relative">
                    <div style="height: 200px; background: linear-gradient(135deg, #1e293b, #475569); display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-trophy text-white-50" style="font-size: 4rem;"></i>
                    </div>
                    <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">CONCURSO</span>
                </div>
                <div class="card-body p-4">
                    <small class="text-primary fw-bold">📅 Cierre: 15 Nov</small>
                    <h4 class="text-white fw-bold mt-2 mb-3">Reto de Diseño: Vivienda Sostenible</h4>
                    <p class="text-white-50 small">Participa con tu proyecto final del curso intermedio y gana una beca completa para el nivel avanzado.</p>
                    <a href="#" class="btn btn-outline-light w-100 rounded-pill mt-2">Ver Bases</a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('home.partials.footer')
@endsection