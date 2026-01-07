@extends('components.layouts.welcome')

@section('title', 'Curso SolidWorks Avanzado | AMISAM')

@push('styles')
    <!-- Reutilizamos el CSS maestro -->
    <link rel="stylesheet" href="{{ asset('css/course_details.css') }}">
@endpush

@section('content')

    <!-- 1. HERO SECTION -->
    <section class="curso-hero">
        <div class="container" data-aos="fade-down">
            <h1>SolidWorks Avanzado</h1>
            <p class="lead">Especialízate en modelado de superficies complejas, diseño de moldes, estructuras soldadas y simulación profesional.</p>
            
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
                    <i class="bi bi-bezier2" style="color: #ef4444;"></i>
                    <span>Modelar formas orgánicas complejas con superficies avanzadas</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-layers-half" style="color: #ef4444;"></i>
                    <span>Diseñar piezas de chapa metálica y desarrollos para corte</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-bricks" style="color: #ef4444;"></i>
                    <span>Crear estructuras soldadas y listas de cortes automáticas</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-cpu" style="color: #ef4444;"></i>
                    <span>Diseñar núcleos y cavidades para inyección de plástico (Moldes)</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-activity" style="color: #ef4444;"></i>
                    <span>Validar diseños con Simulación de Esfuerzos (FEA)</span>
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
                            <i class="bi bi-exclude" style="color: #fca5a5;"></i> Superficies Avanzadas
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Creación de curvas 3D y splines de estilo</li>
                                <li>Recubrimiento (Loft) y Barrido de superficies</li>
                                <li>Reparación de geometría importada</li>
                                <li>Híbridos Sólido-Superficie</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 2 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-box-seam" style="color: #fca5a5;"></i> Chapa Metálica & Estructuras
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Bridas, pliegues y herramientas de conformado</li>
                                <li>Conversión de sólido a chapa</li>
                                <li>Miembros estructurales y cartelas</li>
                                <li>Listas de cortes para soldadura</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 3 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-usb-drive" style="color: #fca5a5;"></i> Herramientas de Moldes
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Análisis de ángulo de salida y contracción</li>
                                <li>Líneas de separación y superficies desconectadas</li>
                                <li>Creación de Núcleo y Cavidad</li>
                                <li>Electrodos y canales de enfriamiento</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 4 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-graph-up" style="color: #fca5a5;"></i> Simulación (FEA)
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Análisis estático lineal de piezas y ensamblajes</li>
                                <li>Aplicación de fuerzas, presiones y torques</li>
                                <li>Factor de seguridad y trazado de desplazamientos</li>
                                <li>Optimización de diseño basada en resultados</li>
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
                            <i class="bi bi-laptop" style="color: #fca5a5;"></i> Workstation Recomendada
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Procesador i7/Ryzen 7 de alta frecuencia</li>
                                <li>32 GB de RAM (Para ensamblajes grandes y simulación)</li>
                                <li>Tarjeta gráfica certificada (Nvidia Quadro/RTX A-Series)</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-code-square" style="color: #fca5a5;"></i> Conocimientos Previos
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>SolidWorks 2021 o superior</li>
                                <li><strong>Haber completado SolidWorks Básico</strong></li>
                                <li>Certificación CSWA (Recomendada)</li>
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
                    <p>Al aprobar el proyecto final recibirás:</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Diploma de <strong>Diseñador SolidWorks Profesional (Nivel II)</strong></li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Entrenamiento intensivo para el examen <strong>CSWP</strong></li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Acceso a bolsa laboral de ingeniería</li>
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
    <a id="download-brochure-fab" href="{{ asset('brochure/Brochure-solidworks-avanzado.pdf') }}" download target="_blank" title="Descargar Brochure" style="background: linear-gradient(135deg, #ef4444, #b91c1c);">
        <i class="bi bi-file-earmark-arrow-down-fill"></i>
    </a>

    <!-- MODAL VISTA PREVIA PDF -->
    <div class="modal fade" id="brochureModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content" style="background: #1e293b; color: white;">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Brochure - SolidWorks Avanzado</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0" style="height: 75vh;">
                    <iframe id="brochureIframe" src="" style="width:100%; height:100%; border:none;"></iframe>
                </div>
                <div class="modal-footer border-0">
                    <a id="download-brochure-btn" href="{{ asset('brochure/Brochure-solidworks-avanzado.pdf') }}" class="btn btn-primary" download>
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
            const pdfPath = "{{ asset('brochure/Brochure-solidworks-avanzado.pdf') }}";
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