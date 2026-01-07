<style>
    #container-slider {
        background: url('<?php echo BASE_URL; ?>/img/video.gif') no-repeat center center;
        background-size: cover;
        height: 100vh;
    }

    #carouselExampleControls {
        height: 100%;
    }

    .carousel-inner {
        display: flex;

        align-items: center;
        height: 100%;
    }

    .carousel-card {
        max-width: 350px;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin: auto;
    }

    .carousel-card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .carousel-card {
        object-fit: cover;
    }

    .card-img-top {
        width: 100%;
        height: 200px;
    }

    .carousel-card .card-body {
        padding: 15px;
        text-align: center;
    }

    .carousel-card,
    #card-title {
        font-size: 1.25rem;

        margin-bottom: 10px;
    }

    .carousel-card {
        font-size: 1rem;
        margin-bottom: 15px;
    }

    #card-title {
        font-weight: bold;
        color: rgb(64, 58, 58);
    }

    #card-p {
        color: rgb(0, 0, 0);
    }

    .carousel-card {
        border-radius: 15px;
        font-weight: bold;
        padding: 10px 20px;
        color: black;
    }

    .carousel-control-prev,
    .carousel-control-next {
        filter: invert(100%);
    }
    
    @media (max-width: 768px) {
        #container-slider {
            height: auto;
            padding: 20px 0;
        }

        #carouselExampleControls {
            height: auto;
        }

        .carousel-card {
            max-width: 90%;
        }

        .card-img-top {
            height: 150px;
        }
    }
</style>
<div class="col-md-12" id="container-slider">
    <div class="row">
        <div class="col-md-6 col-12">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- First Card -->
                    <div class="carousel-item active">
                        <div class="carousel-card card">
                            <img src="<?php echo BASE_URL; ?>/img/basic.png" class="card-img-top" alt="Curso 1">
                            <div class="card-body">
                                <h5 class="card-title" id="card-title">Nivel 1</h5>
                                <p class="card-text" id="card-p">Aprende habilidades esenciales en línea con instructores expertos.</p>
                                <a href="#" class="btn btn-warning" id="btn1"><i class="bi bi-eye"></i> Ver Curso</a>
                                <a href="#" class="btn btn-outline-danger" id="btn2">Más Información</a>
                            </div>
                        </div>
                    </div>

                    <!-- Second Card -->
                    <div class="carousel-item">
                        <div class="carousel-card card">
                            <img src="<?php echo BASE_URL; ?>/img/intermedio.png" class="card-img-top" alt="Curso 2">
                            <div class="card-body">
                                <h5 class="card-title">Nivel 2</h5>
                                <p class="card-text">Obtén certificaciones internacionales en una variedad de disciplinas.</p>
                                <a href="#" class="btn btn-warning" id="btn1"><i class="bi bi-eye"></i> Ver Curso</a>
                                <a href="#" class="btn btn-outline-danger">Más Información</a>
                            </div>
                        </div>
                    </div>

                    <!-- Third Card -->
                    <div class="carousel-item">
                        <div class="carousel-card card">
                            <img src="<?php echo BASE_URL; ?>/img/avanzado.png" class="card-img-top" alt="Curso 3">
                            <div class="card-body">
                                <h5 class="card-title">Nivel 3</h5>
                                <p class="card-text">Descubre programas especializados y domina nuevas habilidades.</p>
                                <a href="#" class="btn btn-warning" id="btn1"><i class="bi bi-eye"></i> Ver Curso</a>
                                <a href="#" class="btn btn-outline-danger">Más Información</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-6 d-none d-md-flex align-items-center">
            <?php include 'formulario.php'; ?>
        </div>
    </div>