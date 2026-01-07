<div class="container" id="id-container">
    
    <div class="row justify-content-center mb-5">
        <div class="col-12 text-center" id="container-learning-title" data-aos="fade-down">
            <h2>Nuestros Programas</h2>
            <p class="text-light opacity-75">Elige el nivel que se adapte a tus necesidades profesionales</p>
        </div>
    </div>

    <div class="row gy-4 gx-4">
        
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
            <div class="course-card">
                <div class="card-body">
                    <div class="course-img-container">
                        <img src="{{ asset('img/card-cursos1.jpg') }}" alt="AutoCAD Básico">
                    </div>
                    
                    <h3 class="course-title">AutoCAD Básico</h3>
                    <p class="course-desc">
                        Aprende los fundamentos del dibujo técnico, interfaz y herramientas esenciales desde cero.
                    </p>
                </div>
                
                <div class="course-footer">
                    <a href="{{ route('curso.basico') }}" class="btn btn-primary-glow btn-sm-glow flex-grow-1">
                        Ver Detalles
                    </a>
                    <a href="{{ route('curso.basico') }}#inscripcion" class="btn btn-outline-glow btn-sm-glow">
                        <i class="bi bi-cart-plus"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="course-card">
                <div class="card-body">
                    <div class="course-img-container">
                        <img src="{{ asset('img/card-cursos2.jpg') }}" alt="AutoCAD Intermedio">
                    </div>
                    
                    <h3 class="course-title">AutoCAD Intermedio</h3>
                    <p class="course-desc">
                        Perfecciona tus habilidades, gestiona capas avanzadas y optimiza tu flujo de trabajo.
                    </p>
                </div>
                
                <div class="course-footer">
                    <a href="{{ route('curso.intermedio') }}" class="btn btn-primary-glow btn-sm-glow flex-grow-1">
                        Ver Detalles
                    </a>
                    <a href="{{ route('curso.intermedio') }}#inscripcion" class="btn btn-outline-glow btn-sm-glow">
                        <i class="bi bi-cart-plus"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="course-card">
                <div class="card-body">
                    <div class="course-img-container">
                        <img src="{{ asset('img/card-cursos3.jpg') }}" alt="AutoCAD Avanzado">
                    </div>
                    
                    <h3 class="course-title">AutoCAD Avanzado</h3>
                    <p class="course-desc">
                        Domina el modelado 3D, renderizado fotorrealista y automatización de proyectos complejos.
                    </p>
                </div>
                
                <div class="course-footer">
                    <a href="{{ route('curso.avanzado') }}" class="btn btn-primary-glow btn-sm-glow flex-grow-1">
                        Ver Detalles
                    </a>
                    <a href="{{ route('curso.avanzado') }}#inscripcion" class="btn btn-outline-glow btn-sm-glow">
                        <i class="bi bi-cart-plus"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>