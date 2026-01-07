@extends('components.layouts.welcome')

@section('title', 'Curso Avanzado de AutoCAD | AMISAM')

@push('styles')
    <!-- Reutilizamos el mismo CSS que el curso básico e intermedio -->
    <link rel="stylesheet" href="{{ asset('css/course_details.css') }}">
@endpush

@section('content')

    <!-- 1. HERO SECTION -->
    <section class="curso-hero">
        <div class="container" data-aos="fade-down">
            <h1>Curso Avanzado de AutoCAD</h1>
            <p class="lead">Domina el modelado 3D, automatización y personalización al máximo nivel.</p>
            
            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="#inscripcion" class="btn btn-primary btn-lg rounded-pill px-5 fw-bold" style="background: linear-gradient(135deg, #4f46e5, #7c3aed); border:none;">
                    ¡Inscríbete Ahora!
                </a>
                
                <button type="button" class="btn btn-outline-light btn-lg rounded-pill px-4" 
                    data-bs-toggle="modal" data-bs-target="#brochureModal">
                    <i class="bi bi-file-earmark-pdf me-2"></i> Ver Brochure
                </button>
            </div>
        </div>
    </section>

    <div class="container">
        
        <!-- 2. QUÉ APRENDERÁS -->
        <section class="curso-section">
            <h2 class="section-title">¿Qué lograrás?</h2>
            <div class="learn-list" data-aos="fade-up">
                <div class="learn-item">
                    <i class="bi bi-bezier2"></i>
                    <span>Modelado complejo de superficies y mallas 3D</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-code-slash"></i>
                    <span>Creación de macros con AutoLISP, VBA y Action Recorder</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-ui-checks-grid"></i>
                    <span>Personalización avanzada de la interfaz (CUI y palettes)</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-people-fill"></i>
                    <span>Gestión colaborativa: Sheet Sets y BIM 360</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-robot"></i>
                    <span>Automatización de flujos con scripts y APIs .NET</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-clouds"></i>
                    <span>Integración de nubes de puntos y datos GIS</span>
                </div>
            </div>
        </section>

        <!-- 3. TEMARIO -->
        <section class="curso-section">
            <h2 class="section-title">Temario del Curso</h2>
            <div class="row g-4">
                
                <!-- Módulo 1 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="0">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-cube"></i> Modelado 3D Profesional
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Creación de sólidos complejos: LOFT y SWEEP</li>
                                <li>Superficies NURBS para diseños orgánicos</li>
                                <li>Detección de colisiones y cortes 3D</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 2 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-palette"></i> Renderizado Cinematográfico
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Materiales PBR y bibliotecas profesionales</li>
                                <li>Iluminación HDRI y Global Illumination</li>
                                <li>Postproducción y renders 360° para clientes</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 3 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-camera-video"></i> Animación Técnica
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Cámaras animadas con keyframes</li>
                                <li>Recorridos virtuales automáticos (ShowMotion)</li>
                                <li>Exportación a MP4/AVI para presentaciones</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 4 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-terminal"></i> Programación con AutoLISP
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Creación de comandos personalizados</li>
                                <li>Scripts para modificaciones masivas</li>
                                <li>Interfaces de usuario con DCL</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 5 -->
                <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-cloud-download"></i> BIM y Colaboración en la Nube
                        </div>
                        <div class="glass-body">
                            <ul class="d-md-flex flex-wrap gap-md-5">
                                <li>Flujo BIM con Revit/IFC para arquitectura</li>
                                <li>Control de versiones en BIM 360</li>
                                <li>Plantillas ISO/ANSI internacionales</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- 4. REQUISITOS -->
        <section class="curso-section">
            <h2 class="section-title">Requisitos Técnicos</h2>
            <div class="row g-4">
                <div class="col-md-6" data-aos="fade-right">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-laptop"></i> Hardware Recomendado
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Procesador Intel i9 / Ryzen 9</li>
                                <li>32 GB RAM (Mínimo 16 GB)</li>
                                <li>Tarjeta gráfica 8 GB VRAM (RTX 2070+)</li>
                                <li>20 GB de almacenamiento libre SSD</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-code-square"></i> Software & Conocimientos
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>AutoCAD 2024 o superior</li>
                                <li>Licencia profesional o suscripción activa</li>
                                <li><strong>Conocimientos Intermedios (2D, XREF)</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. CERTIFICACIÓN -->
        <section class="cert-section" data-aos="zoom-in">
            <div class="d-flex align-items-center flex-column flex-md-row text-center text-md-start">
                <div class="cert-icon-wrapper mb-4 mb-md-0">
                    <i class="bi bi-award-fill"></i>
                </div>
                <div class="cert-content">
                    <h3>Certificación Oficial</h3>
                    <p>Al completar el curso avanzado recibirás:</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Diploma digital avalado por <span class="highlight">AMISAM</span></li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Acceso a repositorio de scripts y librerías</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Soporte post-curso por <span class="highlight">6 meses</span></li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 6. INSCRIPCIÓN -->
        <section id="inscripcion">
            @include('home.partials.inscribete')
        </section>

    </div>

    <!-- BOTÓN FLOTANTE DESCARGA -->
    <a id="download-brochure-fab" href="{{ asset('brochure/Brochure-avanzado.pdf') }}" download target="_blank" title="Descargar Brochure">
        <i class="bi bi-file-earmark-arrow-down-fill"></i>
    </a>

    <!-- MODAL VISTA PREVIA PDF -->
    <div class="modal fade" id="brochureModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content" style="background: #1e293b; color: white;">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Brochure - Curso Avanzado</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0" style="height: 75vh;">
                    <iframe id="brochureIframe" src="" style="width:100%; height:100%; border:none;"></iframe>
                </div>
                <div class="modal-footer border-0">
                    <a id="download-brochure-btn" href="{{ asset('brochure/Brochure-avanzado.pdf') }}" class="btn btn-primary" download>
                        <i class="bi bi-download me-2"></i> Descargar PDF
                    </a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Lógica del Modal PDF
            const pdfPath = "{{ asset('brochure/Brochure-avanzado.pdf') }}";
            const modal = document.getElementById('brochureModal');
            const iframe = document.getElementById('brochureIframe');

            if(modal) {
                modal.addEventListener('show.bs.modal', function () {
                    iframe.src = pdfPath + "#toolbar=0&navpanes=0";
                });

                modal.addEventListener('hidden.bs.modal', function () {
                    iframe.src = '';
                });
            }
        });
    </script>
@endpush