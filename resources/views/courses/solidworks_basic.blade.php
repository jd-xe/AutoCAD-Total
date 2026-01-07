@extends('components.layouts.welcome')

@section('title', 'Curso SolidWorks Básico | AMISAM')

@push('styles')
    <!-- Reutilizamos el CSS maestro -->
    <link rel="stylesheet" href="{{ asset('css/course_details.css') }}">
@endpush

@section('content')

    <!-- 1. HERO SECTION -->
    <section class="curso-hero">
        <div class="container" data-aos="fade-down">
            <h1>SolidWorks Básico</h1>
            <p class="lead">Iníciate en el diseño mecánico 3D y aprende a modelar piezas y ensamblajes listos para fabricación.</p>
            
            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="#inscripcion" class="btn btn-primary btn-lg rounded-pill px-5 fw-bold" style="background: linear-gradient(135deg, #ef4444, #b91c1c); border:none;">
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
                    <i class="bi bi-pencil-fill" style="color: #ef4444;"></i>
                    <span>Dominar el croquizado paramétrico inteligente</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-box-fill" style="color: #ef4444;"></i>
                    <span>Crear piezas sólidas funcionales desde cero</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-gear-wide" style="color: #ef4444;"></i>
                    <span>Construir ensamblajes con relaciones de posición mecánicas</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-file-earmark-spreadsheet-fill" style="color: #ef4444;"></i>
                    <span>Generar planos técnicos y listas de materiales (BOM)</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-award-fill" style="color: #ef4444;"></i>
                    <span>Bases sólidas para la certificación internacional CSWA</span>
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
                            <i class="bi bi-vector-pen" style="color: #fca5a5;"></i> Interfaz y Croquizado (Sketch)
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Navegación y personalización del entorno</li>
                                <li>Herramientas de croquis y relaciones geométricas</li>
                                <li>Cotas inteligentes y croquizado completamente definido</li>
                                <li>Simetría y matrices lineales/circulares en 2D</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 2 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-box" style="color: #fca5a5;"></i> Modelado de Piezas (Parts)
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Operaciones base: Extrusión y Revolución</li>
                                <li>Operaciones de acabado: Redondeos, Chaflanes, Vaciado</li>
                                <li>Asistente para taladro (Hole Wizard)</li>
                                <li>Asignación de materiales y propiedades de masa</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 3 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-puzzle-fill" style="color: #fca5a5;"></i> Ensamblajes (Assemblies)
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Inserción de componentes y sub-ensamblajes</li>
                                <li>Relaciones de posición estándar (Coincidente, Concéntrica)</li>
                                <li>Detección de interferencias y colisiones</li>
                                <li>Vista explosionada básica</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 4 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-file-richtext" style="color: #fca5a5;"></i> Dibujo Técnico (Drawings)
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Creación de hojas de dibujo y formatos</li>
                                <li>Vistas estándar, proyectadas y de sección</li>
                                <li>Acotado automático y anotaciones</li>
                                <li>Tablas de materiales (BOM) y globos</li>
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
                            <i class="bi bi-laptop" style="color: #fca5a5;"></i> Hardware Recomendado
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Windows 10/11 (64-bit)</li>
                                <li>Procesador 3.3 GHz o superior</li>
                                <li>16 GB de RAM (Mínimo recomendado por Dassault)</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-code-square" style="color: #fca5a5;"></i> Software
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>SolidWorks 2021 o superior</li>
                                <li>No se requiere experiencia previa en CAD 3D</li>
                                <li>Mouse con rueda (scroll) es indispensable</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. CERTIFICACIÓN -->
        <section class="cert-section" data-aos="zoom-in" style="border: 1px solid rgba(239, 68, 68, 0.2);">
            <div class="d-flex align-items-center flex-column flex-md-row text-center text-md-start">
                <div class="cert-icon-wrapper mb-4 mb-md-0" style="color: #ef4444; border-color: #ef4444;">
                    <i class="bi bi-patch-check-fill"></i>
                </div>
                <div class="cert-content">
                    <h3>Certificación Oficial</h3>
                    <p>Al finalizar el curso obtendrás:</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Diploma de <strong>Diseñador SolidWorks Nivel I</strong></li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Preparación para examen internacional CSWA</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Validación curricular por AMISAM</li>
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
    <a id="download-brochure-fab" href="{{ asset('brochure/Brochure-solidworks-basico.pdf') }}" download target="_blank" title="Descargar Brochure" style="background: linear-gradient(135deg, #ef4444, #b91c1c);">
        <i class="bi bi-file-earmark-arrow-down-fill"></i>
    </a>

    <!-- MODAL VISTA PREVIA PDF -->
    <div class="modal fade" id="brochureModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content" style="background: #1e293b; color: white;">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Brochure - SolidWorks Básico</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0" style="height: 75vh;">
                    <iframe id="brochureIframe" src="" style="width:100%; height:100%; border:none;"></iframe>
                </div>
                <div class="modal-footer border-0">
                    <a id="download-brochure-btn" href="{{ asset('brochure/Brochure-solidworks-basico.pdf') }}" class="btn btn-primary" download>
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
            const pdfPath = "{{ asset('brochure/Brochure-solidworks-basico.pdf') }}";
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