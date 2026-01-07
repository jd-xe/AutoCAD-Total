<?php
$title = $title ?? 'Registro Exitoso';
$message = $message ?? 'Tu cuenta ha sido creada con éxito.';
$class = $class ?? 'text-success';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column align-items-center justify-content-center vh-100">
    <div class="card shadow p-4 text-center">
        <h2 class="<?= $class ?>"><?= htmlspecialchars($title) ?></h2>
        <p><?= nl2br(htmlspecialchars($message)) ?></p>

        <?php if (isset($showResendOption) && $showResendOption): ?>
            <p>Si no recibiste el correo de confirmación, puedes solicitar un nuevo envío.</p>
            <form action="https://autocadtotal.com/usuario/reenviarConfirmacion" method="POST">
                <input type="hidden" name="email" value="<?= htmlspecialchars($email ?? '') ?>">
                <button type="submit" class="btn btn-primary">Reenviar Correo</button>
            </form>
        <?php endif; ?>

        <a href="/" class="btn btn-secondary mt-3">Volver al inicio</a>
    </div>
</body>

</html>