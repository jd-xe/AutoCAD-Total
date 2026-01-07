<!-- resources/views/partials/courses/advanced.blade.php -->

<!-- Hero Section -->
<section class="curso-hero text-center rounded mb-5">
    <div class="container">
        <h1>Curso Avanzado de AutoCAD</h1>
        <p class="lead">Domina el modelado 3D, automatización y personalización al máximo nivel</p>
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
                        <span>Modelado complejo de superficies y mallas 3D</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Creación de macros con AutoLISP, VBA y Action Recorder</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Personalización avanzada de la interfaz (CUI y palettes)</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Gestión de proyectos colaborativos: Sheet Sets y BIM 360</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Integración de nubes de puntos y datos GIS</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Automatización de flujos con scripts y APIs .NET</span>
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
                @php
                    $modulos = [
                        [
                            'icon' => 'bi bi-cube',
                            'titulo' => 'Modelado 3D Profesional',
                            'puntos' => [
                                'Creación de sólidos complejos: LOFT y SWEEP',
                                'Superficies NURBS para diseños orgánicos y aerodinámicos',
                                'Detección de colisiones y cortes 3D'
                            ]
                        ],
                        [
                            'icon' => 'bi bi-code-slash',
                            'titulo' => 'Renderizado Cinematográfico',
                            'puntos' => [
                                'Materiales PBR y bibliotecas profesionales',
                                'Iluminación HDRI y Global Illumination para sombras perfectas',
                                'Postproducción en Photoshop y renders 360° para clientes'
                            ]
                        ],
                        [
                            'icon' => 'bi bi-palette',
                            'titulo' => 'Animación Técnica',
                            'puntos' => [
                                'Cámaras animadas con keyframes para videos explicativos',
                                'Recorridos virtuales automáticos con ShowMotion',
                                'Exportación a MP4/AVI para presentaciones ejecutivas'
                            ]
                        ],
                        [
                            'icon' => 'bi bi-people-fill',
                            'titulo' => 'Programación con AutoLISP',
                            'puntos' => [
                                'Crea comandos personalizados',
                                'Scripts para modificar miles de objetos al instante',
                                'Interfaces de usuario con DCL'
                            ]
                        ],
                        [
                            'icon' => 'bi bi-cloud-download',
                            'titulo' => 'BIM y Colaboración en la Nube',
                            'puntos' => [
                                'Flujo BIM con Revit/IFC para proyectos arquitectónicos',
                                'Control de versiones en BIM 360',
                                'Plantillas bajo normas ISO/ANSI para estudios internacionales'
                            ]
                        ],
                    ];
                @endphp

                @foreach($modulos as $mod)
                    <div class="syllabus-card card">
                        <div class="card-header">
                            <i class="{{ $mod['icon'] }} me-2"></i> {{ $mod['titulo'] }}
                        </div>
                        <div class="card-body">
                            <ul>
                                @foreach($mod['puntos'] as $punto)
                                    <li>{{ $punto }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
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
                            <li>Procesador Intel i9 / Ryzen 9</li>
                            <li>32 GB RAM (mínimo 16 GB)</li>
                            <li>Tarjeta gráfica 8 GB VRAM (RTX 2070 o superior)</li>
                            <li>20 GB de almacenamiento libre SSD</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="requirements-card card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-gear"></i> Software</h5>
                        <ul>
                            <li>AutoCAD 2024 o superior</li>
                            <li>Licencia profesional o suscripción activa</li>
                            <li>Conocimientos intermedios (2D, bloques, XREF)</li>
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
                    <li>Acceso a repositorio de scripts y librerías avanzadas</li>
                    <li>Soporte post-curso por <span class="highlight">6 meses</span></li>
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
<a id="download-brochure-fab" href="{{ asset('brochure/Brochure-avanzado.pdf') }}" class="shadow" download
    target="_blank" rel="noopener" aria-label="Descargar brochure">
    <i class="bi bi-file-earmark-pdf-fill"></i>
</a>

<!-- Modal de vista previa del Brochure -->
<div class="modal fade" id="brochureModal" tabindex="-1" aria-labelledby="brochureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="brochureModalLabel">Brochure — Curso Avanzado de AutoCAD</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Cerrar"></button>
            </div>
            <div class="modal-body p-0" style="min-height:70vh;">
                <!-- Visor PDF (iframe) -->
                <iframe id="brochureIframe" src="" style="width:100%; height:70vh; border:0;"
                    title="Vista previa del Brochure"></iframe>
            </div>
            <div class="modal-footer border-0">
                <a id="download-brochure-btn" href="{{ asset('brochure/Brochure-avanzado.pdf') }}"
                    class="btn btn-outline-light" download target="_blank" rel="noopener">
                    <i class="bi bi-download me-1"></i> Descargar Brochure
                </a>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>