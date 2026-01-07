<div id="container-slider">
    <div class="container">
        <div class="row align-items-center justify-content-center"> <div class="col-lg-5 col-md-12 mb-5 mb-lg-0" data-aos="fade-right">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        
                        <div class="carousel-item active">
                            <div class="carousel-card card"> 
                                <img src="{{ asset('img/basic.png') }}" class="card-img-top" alt="Nivel 1">
                                <div class="card-body text-center"> <h3 class="card-title">Nivel Básico</h3>
                                    <p class="card-text">Domina las herramientas esenciales y empieza a diseñar desde cero.</p>
                                    
                                    <div class="d-grid gap-3 mt-4">
                                        <a href="{{ route('curso.basico') }}" class="btn btn-primary-glow rounded-pill py-2">
                                            <i class="bi bi-eye-fill me-2"></i> Ver Curso
                                        </a>
                                        <a href="{{ route('curso.basico') }}#inscripcion" class="btn btn-outline-glow rounded-pill py-2">
                                            Más Información
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-card card">
                                <img src="{{ asset('img/intermedio.jpeg') }}" class="card-img-top" alt="Nivel 2">
                                <div class="card-body text-center">
                                    <h3 class="card-title">Nivel Intermedio</h3>
                                    <p class="card-text">Obtén certificaciones internacionales y mejora tu flujo de trabajo.</p>
                                    
                                    <div class="d-grid gap-3 mt-4">
                                        <a href="{{ route('curso.intermedio') }}" class="btn btn-primary-glow rounded-pill py-2">
                                            <i class="bi bi-eye-fill me-2"></i> Ver Curso
                                        </a>
                                        <a href="{{ route('curso.intermedio') }}#inscripcion" class="btn btn-outline-glow rounded-pill py-2">
                                            Más Información
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-card card">
                                <img src="{{ asset('img/avanzado.png') }}" class="card-img-top" alt="Nivel 3">
                                <div class="card-body text-center">
                                    <h3 class="card-title">Nivel Avanzado</h3>
                                    <p class="card-text">Especialízate en 3D y proyectos complejos de ingeniería.</p>
                                    
                                    <div class="d-grid gap-3 mt-4">
                                        <a href="{{ route('curso.avanzado') }}" class="btn btn-primary-glow rounded-pill py-2">
                                            <i class="bi bi-eye-fill me-2"></i> Ver Curso
                                        </a>
                                        <a href="{{ route('curso.avanzado') }}#inscripcion" class="btn btn-outline-glow rounded-pill py-2">
                                            Más Información
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 offset-lg-1" data-aos="fade-left">
                <livewire:user.register />
            </div>

        </div>
    </div>
</div>