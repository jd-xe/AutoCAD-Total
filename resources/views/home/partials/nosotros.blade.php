@extends('components.layouts.welcome')

@section('title', 'Nosotros | AMISAM')

@section('content')
<div class="container py-5 mt-5">
    
    <!-- 1. ENCABEZADO -->
    <div class="text-center mb-5" data-aos="fade-down">
        <h5 class="text-primary text-uppercase ls-2">Nuestra Esencia</h5>
        <h1 class="display-4 fw-bold text-white">Más que una academia, una comunidad de ingeniería</h1>
    </div>

    <!-- 2. HISTORIA Y VALORES (NUEVO) -->
    <div class="row g-5 mb-5 align-items-center">
        <!-- Historia -->
        <div class="col-lg-6" data-aos="fade-right">
            <h3 class="text-white fw-bold mb-4"><span class="text-warning">Nuestra Historia</span></h3>
            <div class="p-4" style="background: rgba(15, 23, 42, 0.4); border-left: 4px solid #f59e0b; border-radius: 0 20px 20px 0;">
                <p class="text-light opacity-75 lead mb-0">
                    Fundada en 2020, AMISAM nació para responder a una necesidad evidente: la falta de formación especializada en proyectos mecánicos e ingeniería aplicada dentro de los sectores industrial, minero y de construcción. Lo que inició como un pequeño grupo de ingenieros dedicados a compartir conocimiento técnico, hoy se ha consolidado como una plataforma referente en la formación práctica y el desarrollo de soluciones mecánicas reales.
                    <br><br>
                    Entendimos que la teoría universitaria no era suficiente para los retos del mercado laboral actual, por eso creamos una metodología 100% práctica enfocada en la empleabilidad.
                </p>
            </div>
        </div>
        
        <!-- Valores -->
        <div class="col-lg-6" data-aos="fade-left">
            <h3 class="text-white fw-bold mb-4">Nuestros Valores</h3>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="p-3 h-100" style="background: rgba(255,255,255,0.05); border-radius: 15px;">
                        <i class="bi bi-gem text-info fs-3 mb-2"></i>
                        <h5 class="text-white">Excelencia</h5>
                        <p class="text-white-50 small mb-0">No enseñamos comandos, enseñamos criterios profesionales.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 h-100" style="background: rgba(255,255,255,0.05); border-radius: 15px;">
                        <i class="bi bi-people text-warning fs-3 mb-2"></i>
                        <h5 class="text-white">Comunidad</h5>
                        <p class="text-white-50 small mb-0">El aprendizaje continúa después de la clase a través de nuestra red.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 h-100" style="background: rgba(255,255,255,0.05); border-radius: 15px;">
                        <i class="bi bi-lightbulb text-success fs-3 mb-2"></i>
                        <h5 class="text-white">Innovación</h5>
                        <p class="text-white-50 small mb-0">Siempre actualizados con las últimas versiones de software.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 h-100" style="background: rgba(255,255,255,0.05); border-radius: 15px;">
                        <i class="bi bi-shield-check text-primary fs-3 mb-2"></i>
                        <h5 class="text-white">Integridad</h5>
                        <p class="text-white-50 small mb-0">Compromiso real con el resultado de cada estudiante.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. MISIÓN Y VISIÓN -->
    <div class="row g-4 mb-5">
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="0">
            <div class="p-5 h-100 text-center text-md-start" style="background: rgba(30,41,59,0.6); backdrop-filter: blur(10px); border-radius: 20px; border: 1px solid rgba(255,255,255,0.1);">
                <i class="bi bi-rocket-takeoff-fill display-4 text-warning mb-3 d-block"></i>
                <h3 class="text-white fw-bold">Nuestra Misión</h3>
                <p class="text-white-50 lead">Democratizar la educación técnica de alta calidad, permitiendo que estudiantes y profesionales dominen herramientas complejas de ingeniería con una metodología práctica, accesible y orientada a proyectos reales.</p>
            </div>
        </div>
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="p-5 h-100 text-center text-md-start" style="background: rgba(30,41,59,0.6); backdrop-filter: blur(10px); border-radius: 20px; border: 1px solid rgba(255,255,255,0.1);">
                <i class="bi bi-eye-fill display-4 text-info mb-3 d-block"></i>
                <h3 class="text-white fw-bold">Nuestra Visión</h3>
                <p class="text-white-50 lead">Ser la academia referente en Latinoamérica en formación CAD/BIM para el 2026, reconocida internacionalmente por la excelencia pedagógica de nuestros instructores y el éxito laboral comprobado de nuestros egresados.</p>
            </div>
        </div>
    </div>

   <!-- 4. EQUIPO DOCENTE -->
    <div class="text-center mt-5 mb-5" data-aos="fade-in">
        <h2 class="text-white fw-bold">Nuestro Staff de Instructores</h2>
        <p class="text-white-50">Aprende de profesionales activos en la industria</p>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 col-xl-9" data-aos="zoom-in">
            <div class="card border-0 overflow-hidden" style="background: linear-gradient(135deg, rgba(15,23,42,0.9) 0%, rgba(30,41,59,0.8) 100%); border-radius: 20px; border: 1px solid rgba(255,255,255,0.1);">
                <div class="row g-0">
                    
                    <div class="col-md-5 position-relative">
                        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to right, transparent 70%, rgba(15,23,42,0.9) 100%); z-index: 1;"></div>
                        <img src="{{ asset('img/instructor.jpeg') }}" alt="Ing. Fredy Espinoza" class="w-100 h-100" style="object-fit: cover; min-height: 300px; max-height: 450px; filter: grayscale(10%);">
                    </div>

                    <div class="col-md-7 d-flex align-items-center">
                        <div class="card-body p-4 position-relative" style="z-index: 2;">
                            <span class="badge bg-warning text-dark mb-2">Director Académico</span>
                            <h3 class="text-white fw-bold mb-2">Ing. Fredy Espinoza</h3>
                            <p class="text-white-50 small mb-3">Ingeniero Informático Senior con amplia experiencia en proyectos de tecnología aplicada a la infraestructura. Ha capacitado a más de 500 profesionales en herramientas Autodesk.</p>
                            
                            <div class="row g-2">
                                <div class="col-12">
                                    <ul class="list-unstyled text-white-50 small mb-0">
                                        <li class="mb-1"><i class="bi bi-patch-check-fill text-primary me-2"></i>Autodesk Certified Professional (ACP)</li>
                                        <li class="mb-1"><i class="bi bi-patch-check-fill text-primary me-2"></i>Certificación PMP® (PMI)</li>
                                        <li class="mb-1"><i class="bi bi-patch-check-fill text-primary me-2"></i>Especialista en Civil 3D y AutoCAD Mechanical</li>
                                        <li class="mb-1"><i class="bi bi-patch-check-fill text-primary me-2"></i>Experto en AutoCAD Mechanical</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Instructores Adicionales -->
    <div class="row g-4">
        <!-- Instructor 2 -->
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="d-flex align-items-start p-4 h-100" style="background: rgba(255,255,255,0.03); border-radius: 20px; border: 1px solid rgba(255,255,255,0.05);">
                <div class="me-4 flex-shrink-0">
                    <div style="width: 80px; height: 80px; background: #334155; border-radius: 50%; overflow: hidden; border: 2px solid #4f46e5;">
                        <img src="{{ asset('img/ValeryG.png') }}" alt="Arq. Valery Gómez" class="w-100 h-100">
                    </div>
                </div>
                <div>
                    <h4 class="text-white fw-bold mb-1">Arq. Valery Gómez</h4>
                    <p class="text-primary small mb-2 text-uppercase fw-bold">Especialista BIM & Revit</p>
                    <p class="text-white-50 small mb-3">Arquitecta con enfoque en coordinación de proyectos y modelado paramétrico. Consultora BIM para empresas inmobiliarias.</p>
                    <div class="d-flex gap-2">
                        <span class="badge bg-secondary opacity-75">Revit Architecture</span>
                        <span class="badge bg-secondary opacity-75">Navisworks</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Instructor 3 -->
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="d-flex align-items-start p-4 h-100" style="background: rgba(255,255,255,0.03); border-radius: 20px; border: 1px solid rgba(255,255,255,0.05);">
                <div class="me-4 flex-shrink-0">
                    <div style="width: 80px; height: 80px; background: #334155; border-radius: 50%; overflow: hidden; border: 2px solid #4f46e5;">
                        <img src="{{ asset('img/DavidH.png') }}" alt="Ing. David Huamaní" class="w-100 h-100">
                    </div>
                </div>
                <div>
                    <h4 class="text-white fw-bold mb-1">Ing. David Huamaní</h4>
                    <p class="text-primary small mb-2 text-uppercase fw-bold">Estructuras y Cálculo</p>
                    <p class="text-white-50 small mb-3">Experto en análisis estructural y diseño sismorresistente. Apasionado por la automatización de cálculos con Excel y SAP2000.</p>
                    <div class="d-flex gap-2">
                        <span class="badge bg-secondary opacity-75">SAP2000</span>
                        <span class="badge bg-secondary opacity-75">ETABS</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- NUEVOS INSTRUCTORES (Proyectos Mecánicos) -->
        
        <!-- Instructor 4 -->
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="d-flex align-items-start p-4 h-100" style="background: rgba(255,255,255,0.03); border-radius: 20px; border: 1px solid rgba(255,255,255,0.05);">
                <div class="me-4 flex-shrink-0">
                    <div style="width: 80px; height: 80px; background: #334155; border-radius: 50%; overflow: hidden; border: 2px solid #4f46e5;">
                        <img src="{{ asset('img/JavierS.png') }}" alt="Ing. Javier Soto" class="w-100 h-100">
                    </div>
                </div>
                <div>
                    <h4 class="text-white fw-bold mb-1">Ing. Javier Soto</h4>
                    <p class="text-primary small mb-2 text-uppercase fw-bold">Diseño Mecánico & Manufactura</p>
                    <p class="text-white-50 small mb-3">Ingeniero Mecánico especialista en diseño de maquinaria industrial, ensamblajes complejos y simulaciones dinámicas para minería.</p>
                    <div class="d-flex gap-2">
                        <span class="badge bg-secondary opacity-75">SolidWorks</span>
                        <span class="badge bg-secondary opacity-75">Inventor</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Instructor 5 -->
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="d-flex align-items-start p-4 h-100" style="background: rgba(255,255,255,0.03); border-radius: 20px; border: 1px solid rgba(255,255,255,0.05);">
                <div class="me-4 flex-shrink-0">
                    <div style="width: 80px; height: 80px; background: #334155; border-radius: 50%; overflow: hidden; border: 2px solid #4f46e5;">
                        <img src="{{ asset('img/MarielaR.png') }}" alt="Ing. Mariela Rojas" class="w-100 h-100">
                    </div>
                </div>
                <div>
                    <h4 class="text-white fw-bold mb-1">Ing. Mariela Rojas</h4>
                    <p class="text-primary small mb-2 text-uppercase fw-bold">Piping & Plantas Industriales</p>
                    <p class="text-white-50 small mb-3">Especialista en diseño de sistemas de tuberías y plantas de procesamiento. Experta en normativas ASME y API para el sector Oil & Gas.</p>
                    <div class="d-flex gap-2">
                        <span class="badge bg-secondary opacity-75">AutoCAD Plant 3D</span>
                        <span class="badge bg-secondary opacity-75">Navisworks</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<footer>@include('home.partials.footer')</footer>
@endsection