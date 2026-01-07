<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Estado' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .btn-custom {
            padding: 10px 20px;
            font-size: 1.2rem;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="content">
        <div>
            <h2 class="<?= $class ?? 'text-primary' ?>"><?= $title ?? 'Estado' ?></h2>
            <p><?= $message ?? 'Ha ocurrido un evento.' ?></p>
            <a href="/" class="btn btn-lg btn-custom <?= $buttonClass ?? 'btn-primary' ?>">Volver al inicio</a>
        </div>
    </div>
</body>

</html>