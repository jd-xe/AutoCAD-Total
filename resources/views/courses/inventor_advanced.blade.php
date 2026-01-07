@extends('components.layouts.welcome')

@section('title', 'Curso Autodesk Inventor Avanzado | AMISAM')

@push('styles')
    <!-- Reutilizamos el CSS maestro de detalles de curso -->
    <link rel="stylesheet" href="{{ asset('css/course_details.css') }}">
@endpush

@section('content')

    <!-- 1. HERO SECTION -->
    <section class="curso-hero">
        <div class="container" data-aos="fade-down">
            <h1>Autodesk Inventor Avanzado</h1>
            <p class="lead">Especialízate en diseño de maquinaria compleja, estructuras soldadas, tuberías y simulación de esfuerzos (FEA).</p>
            
            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="#inscripcion" class="btn btn-primary btn-lg rounded-pill px-5 fw-bold" style="background: linear-gradient(135deg, #f59e0b, #d97706); border:none;">
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
                    <i class="bi bi-layers-half"></i>
                    <span>Diseñar piezas de chapa metálica y obtener patrones planos (DXF)</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-grid-3x3"></i>
                    <span>Crear estructuras metálicas complejas con Frame Generator</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-moisture"></i>
                    <span>Enrutar sistemas de tuberías rígidas y mangueras flexibles</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-activity"></i>
                    <span>Realizar análisis de elementos finitos (FEA) para validar resistencia</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-code-square"></i>
                    <span>Automatizar configuraciones de diseño con iLogic</span>
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
                            <i class="bi bi-exclude"></i> Chapa Metálica (Sheet Metal)
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Configuración de reglas de chapa y factor K</li>
                                <li>Operaciones: Pestañas (Flange), Dobleces y Dobladillos</li>
                                <li>Punzonado y cortes normales</li>
                                <li>Generación de desarrollo (Flat Pattern) para corte láser</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 2 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-bricks"></i> Estructuras y Soldadura
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Uso del Frame Generator (Perfiles ISO/DIN)</li>
                                <li>Tratamiento de finales: Biseles y muescas</li>
                                <li>Preparación de superficies para soldadura</li>
                                <li>Simbología y cordones de soldadura 3D</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 3 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-union"></i> Tuberías (Tube & Pipe)
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Creación de rutas 3D automáticas y manuales</li>
                                <li>Tuberías rígidas, dobladas y mangueras flexibles</li>
                                <li>Inserción de accesorios (Codos, Tés, Válvulas)</li>
                                <li>Documentación de isométricos de tubería</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 4 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-graph-up-arrow"></i> Análisis y Simulación (FEA)
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Configuración de materiales y cargas estáticas</li>
                                <li>Análisis de tensión Von Mises y Desplazamiento</li>
                                <li>Cálculo del Factor de Seguridad</li>
                                <li>Generación de reportes de ingeniería</li>
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
                                <li>Procesador Intel i7 / Ryzen 7 (Alta frecuencia)</li>
                                <li>32 GB de RAM (Recomendado para ensamblajes grandes)</li>
                                <li>Tarjeta gráfica Certificada (Nvidia Quadro/RTX)</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-code-square"></i> Conocimientos Previos
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Autodesk Inventor 2023 o superior</li>
                                <li><strong>Haber completado Inventor Básico</strong></li>
                                <li>Conocimientos de procesos de fabricación ayudan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. CERTIFICACIÓN -->
        <section class="cert-section" data-aos="zoom-in">
            <div class="d-flex align-items-center flex-column flex-md-row text-center text-md-start">
                <div class="cert-icon-wrapper mb-4 mb-md-0" style="color: #f59e0b; border-color: #f59e0b;">
                    <i class="bi bi-award-fill"></i>
                </div>
                <div class="cert-content">
                    <h3>Certificación Oficial</h3>
                    <p>Al aprobar el proyecto de especialización recibirás:</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Certificado de <strong>Especialista en Diseño Mecánico Avanzado</strong></li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Portafolio digital validado para postulaciones</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Acceso a bolsa de trabajo exclusiva</li>
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
    <a id="download-brochure-fab" href="{{ asset('brochure/Brochure-inventor-avanzado.pdf') }}" download target="_blank" title="Descargar Brochure" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
        <i class="bi bi-file-earmark-arrow-down-fill"></i>
    </a>

    <!-- MODAL VISTA PREVIA PDF -->
    <div class="modal fade" id="brochureModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content" style="background: #1e293b; color: white;">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Brochure - Inventor Avanzado</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0" style="height: 75vh;">
                    <iframe id="brochureIframe" src="" style="width:100%; height:100%; border:none;"></iframe>
                </div>
                <div class="modal-footer border-0">
                    <a id="download-brochure-btn" href="{{ asset('brochure/Brochure-inventor-avanzado.pdf') }}" class="btn btn-primary" download>
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
            const pdfPath = "{{ asset('brochure/Brochure-inventor-avanzado.pdf') }}";
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