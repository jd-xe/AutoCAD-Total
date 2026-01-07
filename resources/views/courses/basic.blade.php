@extends('components.layouts.welcome')

@section('title', 'Curso Básico de AutoCAD | AMISAM')

@push('styles')
    <!-- Vinculamos el CSS único para todos los cursos -->
    <link rel="stylesheet" href="{{ asset('css/course_details.css') }}">
@endpush

@section('content')

    <!-- 1. HERO SECTION -->
    <section class="curso-hero">
        <div class="container" data-aos="fade-down">
            <h1>Curso Básico de AutoCAD</h1>
            <p class="lead">Domina los fundamentos del diseño técnico en 2D desde cero con estándares profesionales.</p>
            
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
                <!-- Item 1 -->
                <div class="learn-item">
                    <i class="bi bi-layout-text-window-reverse"></i>
                    <span>Dominar la interfaz y espacios de trabajo</span>
                </div>
                <!-- Item 2 -->
                <div class="learn-item">
                    <i class="bi bi-pencil-square"></i>
                    <span>Crear dibujos técnicos 2D con precisión milimétrica</span>
                </div>
                <!-- Item 3 -->
                <div class="learn-item">
                    <i class="bi bi-layers-fill"></i>
                    <span>Organizar proyectos profesionales con capas</span>
                </div>
                <!-- Item 4 -->
                <div class="learn-item">
                    <i class="bi bi-printer-fill"></i>
                    <span>Configurar láminas para impresión (Plotting)</span>
                </div>
            </div>
        </section>

        <!-- 3. TEMARIO (Grid de 3 columnas para aprovechar espacio) -->
        <section class="curso-section">
            <h2 class="section-title">Temario del Curso</h2>
            <div class="row g-4">
                
                <!-- Módulo 1 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-intersect"></i> Introducción & Entorno
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Conceptos CAD y aplicaciones</li>
                                <li>Archivos DWG, DWT, DXF</li>
                                <li>Model Space vs Paper Space</li>
                                <li>Navegación y Zoom</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 2 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-sliders"></i> Configuración Inicial
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Unidades y Sistemas de Coordenadas</li>
                                <li>Personalización (CUI) básica</li>
                                <li>Uso de plantillas ISO/ANSI</li>
                                <li>Capas (Layers) y Propiedades</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 3 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-pen"></i> Herramientas de Dibujo
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Líneas, Polilíneas y Círculos</li>
                                <li>Modificadores (Trim, Extend, Offset)</li>
                                <li>Arrays y Patrones</li>
                                <li>Textos y Acotado Básico</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- 4. REQUISITOS (Dos columnas) -->
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
                                <li>Windows 10/11 (64-bit)</li>
                                <li>Procesador i5/Ryzen 5 o superior</li>
                                <li>8 GB de RAM mínimo</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-code-square"></i> Software
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>AutoCAD 2020 o superior</li>
                                <li>Licencia Educativa o Profesional</li>
                                <li><strong>No se requiere experiencia previa</strong></li>
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
                    <p>Al aprobar el proyecto final recibirás:</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Diploma digital verificado por <span class="highlight">AMISAM</span></li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Acceso de por vida a la comunidad de alumnos</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Biblioteca de bloques y recursos gratuitos</li>
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
    <a id="download-brochure-fab" href="{{ asset('brochure/Brochure-basico.pdf') }}" download target="_blank" title="Descargar Brochure">
        <i class="bi bi-file-earmark-arrow-down-fill"></i>
    </a>

    <!-- MODAL VISTA PREVIA PDF -->
    <div class="modal fade" id="brochureModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content" style="background: #1e293b; color: white;">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Brochure - Curso Básico</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0" style="height: 75vh;">
                    <iframe id="brochureIframe" src="" style="width:100%; height:100%; border:none;"></iframe>
                </div>
                <div class="modal-footer border-0">
                    <a id="download-brochure-btn" href="{{ asset('brochure/Brochure-basico.pdf') }}" class="btn btn-primary" download>
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
            const pdfPath = "{{ asset('brochure/Brochure-basico.pdf') }}";
            const modal = document.getElementById('brochureModal');
            const iframe = document.getElementById('brochureIframe');

            if(modal) {
                modal.addEventListener('show.bs.modal', function () {
                    // Cargar PDF solo al abrir el modal (ahorra datos)
                    iframe.src = pdfPath + "#toolbar=0&navpanes=0";
                });

                modal.addEventListener('hidden.bs.modal', function () {
                    // Limpiar al cerrar
                    iframe.src = '';
                });
            }
        });
    </script>
@endpush