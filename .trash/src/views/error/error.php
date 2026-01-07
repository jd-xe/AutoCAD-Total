<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once BASE_PATH . '/src/views/inc/head.php'; ?>
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/error/error.css">
</head>

<body>
    <div id="general-wrapper">
        <?php require_once __DIR__ . '/../inc/header.php'; ?>

        <main id="general-content">
            <div>
                <h1 class="<?= htmlspecialchars($class ?? 'text-danger') ?>">
                    <?= htmlspecialchars($code ?? 'Error') ?> - <?= htmlspecialchars($title) ?>
                </h1>
                <p><?= htmlspecialchars($message) ?></p>
                <a href="/" class="btn btn-primary" id="btn-back-home">Volver al Inicio</a>
            </div>
        </main>

        <?php require_once __DIR__ . '/../inc/footer.php'; ?>
    </div>
</body>

</html>