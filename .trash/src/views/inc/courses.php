<style>
    #id-container {
        color: aliceblue;
        padding-top: 20px;
        justify-content: center;
        align-items: center;
    }

    #card-cursos1 {
        background-image: url('<?php echo BASE_URL; ?>/img/card-cursos1.jpg');
        color: aliceblue;
    }

    #card-cursos2 {
        background-image: url('<?php echo BASE_URL; ?>/img/card-cursos2.jpg');
        color: aliceblue;
    }

    #card-cursos3 {
        background-image: url('<?php echo BASE_URL; ?>/img/card-cursos3.jpg');
        color: aliceblue;
    }

    #curso-p {
        color: aliceblue;
    }

    #curso-footer {
        background-color: #fff;
    }

    /* Ocultar cards inicialmente */
    .card.hidden {
        opacity: 0;
        transform: translateY(1000px);
        /* Desliza hacia abajo */
        transition: all 0.6s ease-out;
    }

    /* Mostrar cards con animación */
    .card.show {
        opacity: 1;
        transform: translateY(0);
        /* Vuelve a su posición original */
    }
</style>

<div class="container d-flex" id="id-container">
    <div class="row justify-content-center gy-4 gx-3">
        <!-- Título -->
        <div class="col-12 text-center mb-4" id="container-learning-title">
            <h2>Sección de Cursos</h2>
        </div>

        <!-- Curso Básico -->
        <div class="col-md-4">
            <div class="card" id="card-cursos1">
                <div class="card-body d-flex align-items-center">
                    <img src="<?php echo BASE_URL; ?>/img/card-cursos1.jpg" class="card-img-top me-3" alt="Curso Básico" style="width: 130px; height: auto;">
                    <div class="text-black">
                        <h1 class="display-6 fw-bold" id="curso-p">AutoCAD Básico</h1>
                        <p id="curso-p">Aprende los fundamentos del dibujo técnico con AutoCAD.</p>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between" id="curso-footer">
                    <a href="#" class="btn btn-success btn-rounded">Ver Curso</a>
                    <a href="#" class="btn btn-outline-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#loginModal">Comprar Curso</a>
                </div>
            </div>
        </div>

        <!-- Curso Intermedio -->
        <div class="col-md-4">
            <div class="card" id="card-cursos2">
                <div class="card-body d-flex align-items-center">
                    <img src="<?php echo BASE_URL; ?>/img/card-cursos2.jpg" class="card-img-top me-3" alt="Curso Intermedio" style="width: 150px; height: auto;">
                    <div class="text-black">
                        <h1 class="display-6 fw-bold" id="curso-p">AutoCAD Intermedio</h1>
                        <p id="curso-p">Perfecciona tus habilidades con herramientas avanzadas de AutoCAD.</p>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between" id="curso-footer">
                    <a href="#" class="btn btn-success btn-rounded">Ver Curso</a>
                    <a href="#" class="btn btn-outline-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#loginModal">Comprar Curso</a>
                </div>
            </div>
        </div>

        <!-- Curso Avanzado -->
        <div class="col-md-4">
            <div class="card" id="card-cursos3">
                <div class="card-body d-flex align-items-center">
                    <img src="<?php echo BASE_URL; ?>/img/card-cursos3.jpg" class="card-img-top me-3" alt="Curso Avanzado" style="width: 150px; height: auto;">
                    <div class="text-black">
                        <h1 class="display-6 fw-bold" id="curso-p">AutoCAD Avanzado</h1>
                        <p id="curso-p">Domina técnicas avanzadas para proyectos complejos con AutoCAD.</p>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between" id="curso-footer">
                    <a href="#" class="btn btn-success btn-rounded">Ver Curso</a>
                    <a href="#" class="btn btn-outline-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#loginModal">Comprar Curso</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const cards = document.querySelectorAll('.card');
    const revealCards = () => {
        const windowHeight = window.innerHeight;

        cards.forEach((card) => {
            const cardTop = card.getBoundingClientRect().top;
            if (cardTop < windowHeight - 100) {
                card.classList.add('show');
            }
        });
    };
    window.addEventListener('scroll', revealCards);
    revealCards();

    gsap.from(".card", {
        scrollTrigger: ".card",
        y: 85,
        opacity: 0,
        duration: 0.02,
        stagger: 0.6
    });
</script>