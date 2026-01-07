<!-- Hero Section -->
<section class="curso-hero text-center rounded mb-5">
    <div class="container">
        <h1>Curso Básico de AutoCAD</h1>
        <p class="lead">Domina los fundamentos del diseño técnico en 2D desde cero</p>
        <a href="#inscripcion" class="btn btn-primary btn-lg">¡Inscríbete Ahora!</a>
        <a href="#" id="btn-brochure-preview" class="btn btn-outline-light btn-lg ms-3" data-bs-toggle="modal"
            data-bs-target="#brochureModal" aria-haspopup="dialog" aria-controls="brochureModal">
            <i class="bi bi-download me-1"></i> Brochure (PDF)
        </a>
    </div>
</section>

<div class="container">
    <!-- What You'll Learn -->
    <section class="curso-section">
        <h2 class="section-title">¿Qué aprenderás?</h2>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <ul class="list-group learn-list">
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Manejar la interfaz de AutoCAD y espacios de trabajo</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Crear dibujos técnicos en 2D con precisión</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Organizar proyectos con capas y bloques</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Preparar archivos para impresión profesional</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Syllabus -->
    <section class="curso-section">
        <h2 class="section-title">Temario del Curso</h2>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="syllabus-card card">
                    <div class="card-header">
                        <i class="bi bi-intersect me-2"></i> Introducción a AutoCAD
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>¿Qué es CAD y aplicaciones industriales?</li>
                            <li>Tipos de archivos: DWG, DWT, DXF</li>
                            <li>Entornos: <em>Model Space</em> vs <em>Paper Space</em></li>
                        </ul>
                    </div>
                </div>

                <div class="syllabus-card card">
                    <div class="card-header">
                        <i class="bi bi-gear me-2"></i> Configuración e Interfaz
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Personalización de la interfaz</li>
                            <li>Configuración de unidades</li>
                            <li>Uso de plantillas</li>
                        </ul>
                    </div>
                </div>

                <div class="syllabus-card card">
                    <div class="card-header">
                        <i class="bi bi-pencil me-2"></i> Herramientas de Dibujo
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Creación de formas básicas</li>
                            <li>Uso de coordenadas y precisión</li>
                            <li>Modificación de objetos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Requirements -->
    <section class="curso-section">
        <h2 class="section-title">Requisitos</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="requirements-card card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-pc-display"></i> Hardware</h5>
                        <ul>
                            <li>Windows 10 (64-bit) o macOS con BootCamp</li>
                            <li>Procesador Intel i5 o equivalente</li>
                            <li>8 GB RAM mínimo</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="requirements-card card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-gear"></i> Software</h5>
                        <ul>
                            <li>AutoCAD 2020 o superior</li>
                            <li>Versión estudiantil o licencia activa</li>
                            <li>No se requieren conocimientos previos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Certification -->
    <section class="cert-section">
        <div class="d-flex flex-wrap align-items-center">
            <i class="bi bi-award-fill cert-icon"></i>
            <div class="cert-content">
                <h2>Certificación</h2>
                <p>Al completar el curso recibirás:</p>
                <ul>
                    <li>Diploma digital avalado por <span class="highlight">AMISAM</span></li>
                    <li>Acceso a recursos exclusivos (plantillas, bibliotecas de bloques)</li>
                    <li>Soporte post-curso por <span class="highlight">3 meses</span></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Registration Form -->
    <section id="inscripcion">
        @include('home.partials.inscribete')
    </section>
</div>

<!-- Botón flotante para descarga rápida -->
<a id="download-brochure-fab" href="{{ asset('brochure/Brochure-basico.pdf') }}" class="shadow" download target="_blank"
    rel="noopener" aria-label="Descargar brochure">
    <i class="bi bi-file-earmark-pdf-fill"></i>
</a>

<!-- Modal de vista previa del Brochure -->
<div class="modal fade" id="brochureModal" tabindex="-1" aria-labelledby="brochureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="brochureModalLabel">Brochure — Curso Básico de AutoCAD</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Cerrar"></button>
            </div>
            <div class="modal-body p-0" style="min-height:70vh;">
                <!-- Visor PDF (iframe) -->
                <iframe id="brochureIframe" src="" style="width:100%; height:70vh; border:0;"
                    title="Vista previa del Brochure"></iframe>
            </div>
            <div class="modal-footer border-0">
                <a id="download-brochure-btn" href="{{ asset('brochure/brochure-Basico.pdf') }}"
                    class="btn btn-outline-light" download target="_blank" rel="noopener">
                    <i class="bi bi-download me-1"></i> Descargar Brochure
                </a>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>