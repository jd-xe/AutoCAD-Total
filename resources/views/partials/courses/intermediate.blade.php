<!-- resources/views/partials/courses/intermediate.blade.php -->

<!-- Hero Section -->
<section class="curso-hero text-center rounded mb-5">
    <div class="container">
        <h1>Curso Intermedio de AutoCAD</h1>
        <p class="lead">Perfecciona tus habilidades 2D y empieza a modelar en 3D</p>
        <a href="#inscripcion" class="btn btn-primary btn-lg">¡Inscríbete Ahora!</a>
        <a href="#" id="btn-brochure-preview" class="btn btn-outline-light btn-lg ms-3" data-bs-toggle="modal" data-bs-target="#brochureModal" aria-haspopup="dialog" aria-controls="brochureModal">
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
                        <span>Optimizar flujos de trabajo con técnicas avanzadas de edición 2D</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Crear y gestionar bloques dinámicos con atributos personalizados</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Desarrollar modelos 3D básicos y aplicar renderizados sencillos</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Implementar XREF y estándares de dibujo colaborativo</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Automatizar tareas repetitivas con herramientas paramétricas</span>
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
                            'icon' => 'bi bi-speedometer2',
                            'titulo' => 'Bloques Dinámicos y Atributos',
                            'puntos' => [
                                'Bloques con parámetros de rotación, escalado y visibilidad',
                                'Atributos vinculados a datos',
                                'Extracción automática de datos a Excel o tablas'
                            ]
                        ],
                        [
                            'icon' => 'bi bi-blockquote-right',
                            'titulo' => 'Diseño Paramétrico',
                            'puntos' => [
                                'Restricciones geométricas',
                                'Fórmulas matemáticas para medidas automáticas',
                                'Vinculación de parámetros para diseños flexibles'
                            ]
                        ],
                        [
                            'icon' => 'bi bi-diagram-3',
                            'titulo' => 'Modelado 3D Básico',
                            'puntos' => [
                                'Crea sólidos con extrusión y rotación',
                                'Operaciones booleanas',
                                'Edita bordes con chaflanes y empalmes'
                            ]
                        ],
                        [
                            'icon' => 'bi bi-link-45deg',
                            'titulo' => 'Renderizado Profesional',
                            'puntos' => [
                                'Aplica materiales y texturas a tus modelos',
                                'Configura luces y sombras para impacto visual',
                                'Exporta imágenes o archivos para impresión 3D'
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
                            <li>Procesador Intel i7 o equivalente</li>
                            <li>16 GB RAM (mínimo 8 GB)</li>
                            <li>Tarjeta gráfica 4 GB VRAM (GTX 1060 o superior)</li>
                            <li>10 GB de almacenamiento libre</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="requirements-card card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-gear"></i> Software</h5>
                        <ul>
                            <li>AutoCAD 2020 o superior (recomendado 2024 para 3D)</li>
                            <li>Versión estudiantil o licencia activa</li>
                            <li>Conocimientos básicos de 2D (capas, bloques, acotación)</li>
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
                    <li>Acceso a bibliotecas de bloques dinámicos</li>
                    <li>Soporte post-curso y revisión de proyectos</li>
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
<a id="download-brochure-fab" href="{{ asset('brochure/Brochure-intermedio.pdf') }}" class="shadow" download target="_blank" rel="noopener" aria-label="Descargar brochure">
  <i class="bi bi-file-earmark-pdf-fill"></i>
</a>


<!-- Modal de vista previa del Brochure -->
<div class="modal fade" id="brochureModal" tabindex="-1" aria-labelledby="brochureModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="brochureModalLabel">Brochure — Curso Básico de AutoCAD</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body p-0" style="min-height:70vh;">
        <!-- Visor PDF (iframe) -->
        <iframe id="brochureIframe" src="" style="width:100%; height:70vh; border:0;" title="Vista previa del Brochure"></iframe>
      </div>
      <div class="modal-footer border-0">
        <a id="download-brochure-btn" href="{{ asset('brochure/Brochure-intermedio.pdf') }}" class="btn btn-outline-light" download target="_blank" rel="noopener">
          <i class="bi bi-download me-1"></i> Descargar Brochure
        </a>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
