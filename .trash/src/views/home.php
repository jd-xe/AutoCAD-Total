<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once  BASE_PATH . '/src/views/inc/head.php'; ?>
    <link rel="stylesheet" href="<?= BASE_URL; ?>/public/css/index.css">
</head>
<style>
    body {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        background-image: url('<?php echo BASE_URL; ?>/img/foto-background.jpg');
    }

    #floating-buttons-1 {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: flex;
        flex-direction: column;
        gap: 15px;
        z-index: 1000;
    }

    #floating-buttons-1 #btn-1 {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-whatsapp-1 {
        background-color: #14ff6a;
        color: rgb(255, 255, 255);
    }

    .btn-calendar-1 {
        background-color: rgb(234, 253, 20);
        color: rgb(255, 255, 255);
    }

    #btn i {
        font-size: 24px;
    }
</style>

<body>
    <header>
        <?php require_once BASE_PATH . '/src/views/inc/header.php'; ?>
    </header>
    <main>
        <div class="floating-buttons" id="floating-buttons-1">
            <a href="https://wa.me/1234567890" target="_blank" class="btn btn-whatsapp-1" id="btn-1">
                <i class="bi bi-whatsapp"></i>
            </a>
            <a href="https://calendar.google.com" target="_blank" class="btn btn-calendar-1" id="btn-1">
                <i class="bi bi-calendar"></i>
            </a>
        </div>
        <div>
            <?php require_once BASE_PATH . '/src/views/inc/slider.php'; ?>
        </div>
        <section>
            <?php require_once BASE_PATH . '/src/views/inc/courses.php'; ?>
        </section>
        <section>
            <?php require_once BASE_PATH . '/src/views/inc/beneficios.php'; ?>
        </section>
        <section>
            <?php require_once BASE_PATH . '/src/views/inc/level_cursos.php'; ?>
        </section>
        <section>
            <?php require_once BASE_PATH . '/src/views/inc/inscribete.php'; ?>
        </section>

    </main>
    <footer>
        <?php require_once BASE_PATH . '/src/views/inc/footer.php'; ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL; ?>/js/login.js"></script>
</body>

</html>