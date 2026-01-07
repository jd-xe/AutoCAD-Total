<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Comprobante de Pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            max-width: 500px;
            margin: auto;
            margin-top: 50px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .preview-container {
            text-align: center;
            margin-top: 15px;
        }

        .preview-container img,
        .preview-container iframe {
            max-width: 100%;
            border-radius: 5px;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <h2 class="text-center">Subir Comprobante de Pago</h2>

            <?php if (isset($mensaje)): ?>
                <div class="alert alert-info text-center"><?= htmlspecialchars($mensaje) ?></div>
            <?php endif; ?>

            <form action="?route=pago/subirComprobante&token=<?= htmlspecialchars($token_pago) ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="comprobante" class="form-label">Selecciona tu comprobante de pago</label>
                    <input type="file" name="comprobante" id="comprobante" class="form-control" accept="image/*,application/pdf" required>
                    <small class="text-muted">Formatos permitidos: JPG, JPEG, PNG</small>
                </div>

                <!-- Previsualización del archivo -->
                <div class="preview-container">
                    <img id="previewImage" src="" alt="Vista previa" />
                    <iframe id="previewPDF" style="width: 100%; height: 300px;"></iframe>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">Subir Comprobante</button>
            </form>
        </div>
    </div>

    <script>
        document
            .getElementById("comprobante")
            .addEventListener("change", function(event) {
                const file = event.target.files[0];
                const previewImage = document.getElementById("previewImage");
                const previewPDF = document.getElementById("previewPDF");

                if (!file) {
                    previewImage.style.display = "none";
                    previewPDF.style.display = "none";
                    return;
                }

                const fileType = file.type;
                const fileURL = URL.createObjectURL(file);

                if (fileType.includes("image")) {
                    previewImage.src = fileURL;
                    previewImage.style.display = "block";
                    previewPDF.style.display = "none";
                } else if (fileType === "application/pdf") {
                    previewPDF.src = fileURL;
                    previewPDF.style.display = "block";
                    previewImage.style.display = "none";
                }
            });
    </script>

</body>

</html>