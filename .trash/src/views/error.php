<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container text-center mt-5">
        <h1 class="display-1 text-danger"><?= htmlspecialchars($title) ?></h1>
        <h2 class="mb-4"><?= htmlspecialchars($title) ?></h2>
        <p class="mb-4"><?= htmlspecialchars($message) ?></p>
        <a href="index.php" class="btn btn-primary">Volver al inicio</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>