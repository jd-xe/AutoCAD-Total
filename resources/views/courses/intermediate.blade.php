@extends('components.layouts.welcome')

@section('title', 'Curso Intermedio de AutoCAD | AMISAM')

@push('styles')
    <!-- Reutilizamos el mismo CSS que el curso básico -->
    <link rel="stylesheet" href="{{ asset('css/course_details.css') }}">
@endpush

@section('content')

    <!-- 1. HERO SECTION -->
    <section class="curso-hero">
        <div class="container" data-aos="fade-down">
            <h1>Curso Intermedio de AutoCAD</h1>
            <p class="lead">Perfecciona tus habilidades 2D y da el salto al modelado 3D con técnicas profesionales.</p>
            
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
                    <i class="bi bi-lightning-charge-fill"></i>
                    <span>Optimizar flujos de trabajo con edición avanzada 2D</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-box-seam"></i>
                    <span>Crear bloques dinámicos con atributos inteligentes</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-boxes"></i>
                    <span>Modelar sólidos 3D básicos y renderizado inicial</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-diagram-2-fill"></i>
                    <span>Implementar XREF y estándares colaborativos</span>
                </div>
                <div class="learn-item">
                    <i class="bi bi-calculator"></i>
                    <span>Automatizar tareas con diseño paramétrico</span>
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
                            <i class="bi bi-speedometer2"></i> Bloques Dinámicos y Atributos
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Parámetros de rotación, escalado y visibilidad</li>
                                <li>Atributos vinculados a datos</li>
                                <li>Extracción automática a Excel/Tablas</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 2 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-blockquote-right"></i> Diseño Paramétrico
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Restricciones geométricas y dimensionales</li>
                                <li>Fórmulas matemáticas para medidas automáticas</li>
                                <li>Vinculación de parámetros para diseños flexibles</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 3 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-diagram-3"></i> Modelado 3D Básico
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Creación de sólidos (Extrusión, Revolución)</li>
                                <li>Operaciones booleanas (Unión, Diferencia)</li>
                                <li>Edición de bordes (Chaflanes, Empalmes 3D)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Módulo 4 -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="glass-card">
                        <div class="glass-header">
                            <i class="bi bi-link-45deg"></i> Renderizado Profesional
                        </div>
                        <div class="glass-body">
                            <ul>
                                <li>Aplicación de materiales y texturas</li>
                                <li>Configuración de luces y sombras</li>
                                <li>Exportación para presentación o impresión 3D</li>
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
                                <li>Procesador Intel i7 / Ryzen 7 o equivalente</li>
                                <li>16 GB RAM (Mínimo 8 GB)</li>
                                <li>Tarjeta gráfica dedicada 4GB VRAM</li>
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
                                <li>AutoCAD 2020 o superior (2024 recomendado para 3D)</li>
                                <li>Licencia Educativa o Profesional</li>
                                <li><strong>Conocimientos sólidos de AutoCAD 2D</strong></li>
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
                    <p>Al completar el curso intermedio recibirás:</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Diploma digital avalado por <span class="highlight">AMISAM</span></li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Acceso a bibliotecas de bloques dinámicos</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Revisión personalizada de proyectos 3D</li>
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
    <a id="download-brochure-fab" href="{{ asset('brochure/Brochure-intermedio.pdf') }}" download target="_blank" title="Descargar Brochure">
        <i class="bi bi-file-earmark-arrow-down-fill"></i>
    </a>

    <!-- MODAL VISTA PREVIA PDF -->
    <div class="modal fade" id="brochureModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content" style="background: #1e293b; color: white;">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Brochure - Curso Intermedio</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0" style="height: 75vh;">
                    <iframe id="brochureIframe" src="" style="width:100%; height:100%; border:none;"></iframe>
                </div>
                <div class="modal-footer border-0">
                    <a id="download-brochure-btn" href="{{ asset('brochure/Brochure-intermedio.pdf') }}" class="btn btn-primary" download>
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
            const pdfPath = "{{ asset('brochure/Brochure-intermedio.pdf') }}";
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