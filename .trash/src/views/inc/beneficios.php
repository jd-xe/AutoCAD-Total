<style>
      #bene-container {
        padding-top: 5px;
    }

    #bene-title {
        color: aliceblue;
    }

    /* Ocultar inicialmente los bene-cards */
    .bene-card {
        opacity: 0;
        transform: translateX(-100px); /* Empieza fuera del viewport (hacia la izquierda) */
    }
</style>

<div class="container mt-5" id="bene-container">
    <div class="row justify-content-center">
        <!-- Título de la sección -->
        <div class="col-12 text-center mb-4">
            <h2 id="bene-title">Beneficios</h2>
        </div>
    </div>
    <div class="row">
        <!-- Beneficio 1 -->
        <div class="col-md-4 mb-4">
            <div class="card" id="bene-card">
                <div class="card-body text-center">
                    <i class="bi bi-laptop mb-3" style="font-size: 50px; color: #28a745;"></i>
                    <h5 class="card-title">Clases 100% Virtuales</h5>
                    <p class="card-text">Accede a nuestros cursos desde la comodidad de tu hogar, sin necesidad de desplazarte.</p>
                </div>
            </div>
        </div>
        <!-- Beneficio 2 -->
        <div class="col-md-4 mb-4">
            <div class="card" id="bene-card">
                <div class="card-body text-center">
                    <i class="bi bi-broadcast mb-3" style="font-size: 50px; color: #007bff;"></i>
                    <h5 class="card-title">Aprendizaje en Tiempo Real</h5>
                    <p class="card-text">Interacción directa con el instructor y resolución inmediata de dudas en clases en vivo.</p>
                </div>
            </div>
        </div>
        <!-- Beneficio 3 -->
        <div class="col-md-4 mb-4">
            <div class="card" id="bene-card">
                <div class="card-body text-center">
                    <i class="bi bi-person-check mb-3" style="font-size: 50px; color: #ffc107;"></i>
                    <h5 class="card-title">Soporte Personalizado</h5>
                    <p class="card-text">Asesoría directa con el instructor para resolver tus inquietudes y mejorar tu aprendizaje.</p>
                </div>
            </div>
        </div>
    </div>
</div>

