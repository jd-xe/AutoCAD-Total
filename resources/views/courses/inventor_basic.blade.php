@extends('components.layouts.welcome')

@section('title', 'Curso Autodesk Inventor Básico | AMISAM')

@push('styles')
    <!-- Reutilizamos el CSS maestro de detalles de curso -->
    <link rel="stylesheet" href="{{ asset('css/course_details.css') }}">
@endpush

@section('content')

    <!-- 1. HERO SECTION -->
    <section class="curso-hero">
        <div class="container" data-aos="fade-down">
            <h1>Autodesk Inventor Básico</h1>
            <p class="lead">Domina el diseño mecánico paramétrico y crea tus primeros prototipos digitales en 3D.</p>
            
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
                    <i class="bi bi-vector-pen"></i>
                    <span>Crear bocetos 2D totalmente restringidos y paramétricos</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-box"></i>
                    <span>Modelar piezas 3D sólidas con operaciones base</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-gear-wide-connected"></i>
                    <span>Ensamblar componentes y validar su ajuste mecánico</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-file-earmark-ruled"></i>
                    <span>Generar planos técnicos automáticos para fabricación</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-film"></i>
                    <span>Crear vistas explosionadas básicas para manuales</span>
                </div>
            </div>
        </section>

        <!-- 3. TEMARIO (Estructurado para no chocar con Avanzado) -->
        <section class="curso-section">
            <h2 class="section-title">Temario del Curso</h2>
            <div class="row g-4">
                
                <!-- Módulo 1 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="0">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-compass"></i> Interfaz y Bocetado (Sketching)
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Entorno de proyectos (.ipj) y tipos de archivo</li>
                                <li>Herramientas de dibujo 2D y geometría constructiva</li>
                                <li><strong>Restricciones Geométricas y Dimensionales</strong> (La clave del diseño)</li>
                                <li>Bocetos compartidos y adaptativos</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 2 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-box-seam"></i> Modelado de Piezas (Parts)
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Creación de sólidos: Extrusión, Revolución, Barrido (Sweep)</li>
                                <li>Operaciones de trabajo: Planos, Ejes y Puntos</li>
                                <li>Modificadores: Agujeros (Hole), Empalmes, Chaflanes</li>
                                <li>Materiales y propiedades físicas (Masa, Volumen)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 3 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-puzzle"></i> Ensamblajes (Assemblies)
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Inserción y posicionamiento de componentes</li>
                                <li>Restricciones de ensamblaje (Mate, Flush, Angle, Insert)</li>
                                <li>Detección de interferencias básica</li>
                                <li>Uso del Centro de Contenido (Tornillería estándar)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 4 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-files"></i> Documentación y Planos (Drawings)
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Creación de vistas base, proyectadas y auxiliares</li>
                                <li>Secciones, Cortes y Vistas de Detalle</li>
                                <li>Acotado automático y tolerancias dimensionales</li>
                                <li>Lista de materiales (BOM) y globos de referencia</li>
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
                                <li>Windows 10/11 (64-bit)</li>
                                <li>Procesador 2.5 GHz o superior</li>
                                <li>16 GB de RAM (Mínimo 8 GB para piezas simples)</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-code-square"></i> Software & Perfil
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Autodesk Inventor 2022 o superior</li>
                                <li>No se requiere experiencia previa en 3D</li>
                                <li>Conocimientos básicos de dibujo técnico ayudan</li>
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
                    <p>Al finalizar el curso recibirás:</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Certificado de <strong>Diseñador Mecánico Junior</strong></li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Validación curricular por AMISAM</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Acceso a librería de normas ISO/ANSI</li>
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
    <!-- Nota: Asegúrate de crear este PDF o el botón dará 404 -->
    <a id="download-brochure-fab" href="{{ asset('brochure/Brochure-inventor-basico.pdf') }}" download target="_blank" title="Descargar Brochure" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
        <i class="bi bi-file-earmark-arrow-down-fill"></i>
    </a>

    <!-- MODAL VISTA PREVIA PDF -->
    <div class="modal fade" id="brochureModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content" style="background: #1e293b; color: white;">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Brochure - Inventor Básico</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0" style="height: 75vh;">
                    <iframe id="brochureIframe" src="" style="width:100%; height:100%; border:none;"></iframe>
                </div>
                <div class="modal-footer border-0">
                    <a id="download-brochure-btn" href="{{ asset('brochure/Brochure-inventor-basico.pdf') }}" class="btn btn-primary" download>
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
            const pdfPath = "{{ asset('brochure/Brochure-inventor-basico.pdf') }}";
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