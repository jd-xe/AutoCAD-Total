<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f3f6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .card {
            max-width: 550px;
            width: 100%;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            background-color: #ffffff;
        }

        .container-logo {
            margin-bottom: 2rem;
        }

        .logo {
            max-width: 100px;
            margin-bottom: 1rem;
            clip-path: inset(18% 18% 18% 18%);
        }

        .logo-name {
            max-width: 150px;
            margin-bottom: 1rem;
            clip-path: inset(20% 5% 20% 5%);
        }

        .card-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #212529;
        }

        .card-text {
            font-size: 1rem;
            color: #6c757d;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 0.5rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004a99;
        }
    </style>
</head>

<body>

    <div class="card text-center p-4">
        <div class="card-body">
            <div class="container container-logo" style="max-height: 100px;">
                <img src="https://autocadtotal.com//img/amisam.png" alt="Logo AutoCAD" class="logo">
                <img src="https://autocadtotal.com//img/amisam-name.png" alt="Logo AutoCAD" class="logo-name">
            </div>
            <h1 class="card-title"><?= $title ?></h1>
            <p class="card-text"><?= $message ?></p>

            <?php if (isset($urlPago)): ?>
                <div class="my-4">
                    <p class="text-dark fw-semibold">Completa tu inscripción al curso ahora mismo:</p>
                    <a href="<?= htmlspecialchars($urlPago) ?>" class="btn btn-primary">Ir a la Página de Pago</a>
                </div>
            <?php else: ?>
                <p class="mt-4 text-secondary">Revisa tu correo para obtener el enlace de pago.</p>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>