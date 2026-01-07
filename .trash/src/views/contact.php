<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once BASE_PATH . "/src/views/inc/head.php"; ?>
    <style>
        body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-image: url('<?php echo BASE_URL; ?>/img/foto-background.jpg');
        }
    </style>
</head>

<body>
    <?php require_once BASE_PATH . "/src/views/inc/header.php"; ?>

    <main>
        <div class="container mt-5">
            <h1 class="text-center mb-4">Contáctanos</h1>
            <form action="procesar_contacto.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre completo" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Tu correo electrónico" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Tu número de teléfono">
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </main>

    <?php require_once BASE_PATH . "/src/views/inc/footer.php"; ?>
    <script src="<?= BASE_URL; ?>/js/login.js"></script>
</body>

</html>