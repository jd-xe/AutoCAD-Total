<style>
    .body-inscribite {
        width: 100%; /* Ajusta el ancho según lo necesario (por ejemplo, 80%, 500px, etc.) */
        max-width: 800px; /* Limita el tamaño máximo si es necesario */
        margin: 0 auto; /* Centra el contenedor horizontalmente */
        padding: 20px; /* Agrega un poco de espacio interno */
    }

    .call-to-action {
            width: 100%;
            padding: 20px;
            border-radius: 10px;
    }

    #insc-title{
        align-items: center;
        text-align: center;
        color: #fff;
    }

    @media (max-width: 768px) {
        .body-inscribite {
            padding: 10px;
        }
        .call-to-action {
            padding: 15px;
        }
        form {
            width: 100%;
        }
    }
</style>
<div class="body-inscribite d-flex">
<div class="call-to-action" >
        <h2 class="mb-4" id="insc-title">¡Únete a nuestra comunidad!</h2>
        <?php include 'formulario.php'; ?> <!-- Incluye el formulario -->
    </div>
</div>