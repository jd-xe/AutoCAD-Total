@extends('components.layouts.welcome')

@section('title', 'Comunidad | AMISAM')

@section('content')
<div class="container py-5 mt-5">
    
    <!-- 1. HEADER INTRODUCTORIO -->
    <div class="text-center mb-5" data-aos="fade-down">
        <h5 class="text-info text-uppercase ls-2">Experiencia Estudiantil</h5>
        <h1 class="display-4 fw-bold text-white">Más que cursos, construimos futuro</h1>
        <p class="text-white-50 lead mx-auto" style="max-width: 800px;">
            En AMISAM creemos que la ingeniería se aprende haciendo y conectando. Únete a una red de más de 1,500 profesionales y vive la experiencia completa.
        </p>
    </div>

    <!-- 2. CARRUSEL DE EXPERIENCIA (5 Slides) -->
    <div class="row justify-content-center mb-5" data-aos="zoom-in">
        <div class="col-lg-12"> <!-- Ancho completo para mayor impacto -->
            <div id="communityCarousel" class="carousel slide" data-bs-ride="carousel">
                
                <!-- Indicadores -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#communityCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#communityCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#communityCarousel" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#communityCarousel" data-bs-slide-to="3"></button>
                    <button type="button" data-bs-target="#communityCarousel" data-bs-slide-to="4"></button>
                </div>

                <div class="carousel-inner rounded-4 overflow-hidden" style="border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 20px 50px rgba(0,0,0,0.5);">
                    
                    <!-- Slide 1: Laboratorios (Infraestructura) -->
                    <div class="carousel-item active">
                        <div style="height: 550px; background: linear-gradient(to bottom, rgba(15,23,42,0.2), rgba(15,23,42,0.9)), url('{{ asset('img/laboratorio.jpeg') }}') no-repeat center center; background-size: cover;">
                            <div class="carousel-caption d-md-block pb-5">
                                <div class="d-inline-block p-4 rounded-4" style="background: rgba(15, 23, 42, 0.75); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); max-width: 700px;">
                                    <h2 class="fw-bold text-white mb-2">Laboratorios de Alto Rendimiento</h2>
                                    <p class="text-light mb-0 fs-5">Estaciones de trabajo equipadas con tecnología RTX para renderizado y simulación en tiempo real.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2: Clases Presenciales (Metodología) -->
                    <div class="carousel-item">
                        <div style="height: 550px; background: linear-gradient(to bottom, rgba(15,23,42,0.2), rgba(15,23,42,0.9)), url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=2070&auto=format&fit=crop') no-repeat center center; background-size: cover;">
                            <div class="carousel-caption d-md-block pb-5">
                                <div class="d-inline-block p-4 rounded-4" style="background: rgba(15, 23, 42, 0.75); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); max-width: 700px;">
                                    <h2 class="fw-bold text-white mb-2">Entrenamiento Presencial</h2>
                                    <p class="text-light mb-0 fs-5">Workshops intensivos de fin de semana para reforzar lo aprendido en la plataforma virtual.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3: Visitas Técnicas (Campo) -->
                    <div class="carousel-item">
                        <div style="height: 550px; background: linear-gradient(to bottom, rgba(15,23,42,0.2), rgba(15,23,42,0.9)), url('https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=2071&auto=format&fit=crop') no-repeat center center; background-size: cover;">
                            <div class="carousel-caption d-md-block pb-5">
                                <div class="d-inline-block p-4 rounded-4" style="background: rgba(15, 23, 42, 0.75); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); max-width: 700px;">
                                    <h2 class="fw-bold text-white mb-2">Visitas Técnicas a Obra</h2>
                                    <p class="text-light mb-0 fs-5">Conectamos la teoría con la realidad. Experiencias en campo supervisadas por nuestros instructores.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4: Networking (Comunidad) -->
                    <div class="carousel-item">
                        <div style="height: 550px; background: linear-gradient(to bottom, rgba(15,23,42,0.2), rgba(15,23,42,0.9)), url('https://images.unsplash.com/photo-1515187029135-18ee286d815b?q=80&w=2070&auto=format&fit=crop') no-repeat center center; background-size: cover;">
                            <div class="carousel-caption d-md-block pb-5">
                                <div class="d-inline-block p-4 rounded-4" style="background: rgba(15, 23, 42, 0.75); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); max-width: 700px;">
                                    <h2 class="fw-bold text-white mb-2">Networking Profesional</h2>
                                    <p class="text-light mb-0 fs-5">Eventos exclusivos para conectar con colegas, empresas y líderes del sector construcción y minería.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 5: Próximamente (Futuro) -->
                    <div class="carousel-item">
                        <div style="height: 550px; background: linear-gradient(rgba(15, 23, 42, 0.6), rgba(15, 23, 42, 0.9)), url('https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2069&auto=format&fit=crop') no-repeat center center; background-size: cover; display: flex; align-items: center; justify-content: center;">
                            <div class="text-center px-4">
                                <span class="badge bg-warning text-dark mb-3 px-4 py-2 rounded-pill shadow-lg fw-bold" style="font-size: 1rem;">🚀 MUY PRONTO</span>
                                <h1 class="display-3 fw-bold text-white mb-3">Nueva Sede Central</h1>
                                <p class="lead text-white-50 mb-0">Estamos diseñando espacios colaborativos modernos para tu comodidad.</p>
                                <p class="text-white fw-bold mt-2">¡Prepárate para la experiencia 100% presencial!</p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Controles -->
                <button class="carousel-control-prev" type="button" data-bs-target="#communityCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgba(0,0,0,0.5); border-radius: 50%; padding: 25px; background-size: 50%;"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#communityCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgba(0,0,0,0.5); border-radius: 50%; padding: 25px; background-size: 50%;"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </div>

    <!-- 3. BENEFICIOS (GRID) -->
    <div class="text-center mb-5">
        <h3 class="text-white fw-bold">Ventajas de ser Alumno AMISAM</h3>
    </div>

    <div class="row g-4 mb-5">
        <!-- Bolsa de Trabajo -->
        <div class="col-md-6" data-aos="fade-right">
            <div class="d-flex align-items-start p-4 h-100" style="background: rgba(255,255,255,0.03); border-radius: 20px; border: 1px solid rgba(255,255,255,0.05); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="me-4 mt-2">
                    <div class="bg-primary bg-opacity-25 p-3 rounded-circle text-primary">
                        <i class="bi bi-briefcase-fill fs-3"></i>
                    </div>
                </div>
                <div>
                    <h4 class="text-white fw-bold">Bolsa de Trabajo</h4>
                    <p class="text-white-50 mb-0">Acceso prioritario a convocatorias laborales de nuestras empresas aliadas para prácticas y puestos junior.</p>
                </div>
            </div>
        </div>

        <!-- Grupos VIP -->
        <div class="col-md-6" data-aos="fade-left">
            <div class="d-flex align-items-start p-4 h-100" style="background: rgba(255,255,255,0.03); border-radius: 20px; border: 1px solid rgba(255,255,255,0.05); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="me-4 mt-2">
                    <div class="bg-success bg-opacity-25 p-3 rounded-circle text-success">
                        <i class="bi bi-whatsapp fs-3"></i>
                    </div>
                </div>
                <div>
                    <h4 class="text-white fw-bold">Comunidad VIP</h4>
                    <p class="text-white-50 mb-0">Grupos privados de soporte 24/7 donde instructores y alumnos comparten recursos y resuelven dudas técnicas.</p>
                </div>
            </div>
        </div>

        <!-- Recursos -->
        <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
            <div class="d-flex align-items-start p-4 h-100" style="background: rgba(255,255,255,0.03); border-radius: 20px; border: 1px solid rgba(255,255,255,0.05); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="me-4 mt-2">
                    <div class="bg-warning bg-opacity-25 p-3 rounded-circle text-warning">
                        <i class="bi bi-hdd-network-fill fs-3"></i>
                    </div>
                </div>
                <div>
                    <h4 class="text-white fw-bold">Nube de Recursos</h4>
                    <p class="text-white-50 mb-0">+50GB de material descargable: Familias Revit, Bloques Dinámicos, Scripts LISP y Normativa vigente.</p>
                </div>
            </div>
        </div>

        <!-- Grabaciones -->
        <div class="col-md-6" data-aos="fade-left" data-aos-delay="100">
            <div class="d-flex align-items-start p-4 h-100" style="background: rgba(255,255,255,0.03); border-radius: 20px; border: 1px solid rgba(255,255,255,0.05); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="me-4 mt-2">
                    <div class="bg-danger bg-opacity-25 p-3 rounded-circle text-danger">
                        <i class="bi bi-play-circle-fill fs-3"></i>
                    </div>
                </div>
                <div>
                    <h4 class="text-white fw-bold">Aula Virtual HD</h4>
                    <p class="text-white-50 mb-0">Acceso vitalicio a las grabaciones de tus clases en alta definición para repasar a tu propio ritmo.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. CTA FINAL -->
    <div class="text-center py-5 px-4 rounded-4 position-relative overflow-hidden" style="background: linear-gradient(135deg, rgba(79, 70, 229, 0.2) 0%, rgba(124, 58, 237, 0.2) 100%); border: 1px solid rgba(255,255,255,0.1);">
        <!-- Decoración de fondo -->
        <div style="position: absolute; top: -50%; left: -10%; width: 300px; height: 300px; background: rgba(79,70,229,0.2); filter: blur(80px); border-radius: 50%;"></div>
        
        <div class="position-relative" style="z-index: 2;">
            <h2 class="text-white fw-bold mb-3">¿Listo para potenciar tu carrera?</h2>
            <p class="text-white-50 mb-4 lead">No solo te enseñamos software, te preparamos para la industria.</p>
            <a href="{{ route('home') }}#inscripcion" class="btn btn-primary rounded-pill px-5 py-3 fw-bold shadow-lg text-uppercase ls-1">
                Ver Cursos Disponibles
            </a>
        </div>
    </div>

</div>
@include('home.partials.footer')
@endsection