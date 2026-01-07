<!DOCTYPE html>
<html lang="es">
<?php require_once BASE_PATH . "/src/views/inc/head.php"; ?>

<body>
    <?php include __DIR__ . '/../inc/header.php'; ?>

    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-dark">Matrícula</h2>
            <p class="text-secondary">Selecciona un grupo para completar tu matrícula.</p>
        </div>

        <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle me-2"></i>
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php elseif (isset($_GET['success'])) : ?>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                <?= htmlspecialchars($_GET['success']) ?>
            </div>
        <?php endif; ?>

        <?php if ($pagoAprobado) : ?>
            <div class="alert alert-success p-3 rounded-3 shadow-sm">
                <h5 class="fw-bold">Pago aprobado</h5>
                <p><strong>Descripción:</strong> <?= htmlspecialchars($pagoAprobado['descripcion']) ?></p>
                <p><strong>Monto:</strong> S/ <?= number_format($pagoAprobado['monto'], 2) ?></p>
            </div>

            <form action="matricula/procesar" method="POST" class="shadow-sm p-4 bg-white rounded-3 border">
                <input type="hidden" name="pago_id" value="<?= htmlspecialchars($pagoAprobado['pago_id']) ?>">
                <input type="hidden" name="concepto_id" value="<?= htmlspecialchars($pagoAprobado['concepto_id']) ?>">

                <div class="mb-3">
                    <label for="grupo_id" class="form-label">Selecciona un grupo</label>
                    <select name="grupo_id" id="grupo_id" class="form-select border-dark" required onchange="mostrarHorarios()">
                        <option value="">-- Selecciona un grupo --</option>
                        <?php foreach ($gruposDisponibles as $grupo) : ?>
                            <?php 
                                $horariosTexto = "";
                                if (!empty($horariosPorGrupo[$grupo['grupo_id']])) {
                                    foreach ($horariosPorGrupo[$grupo['grupo_id']] as $horario) {
                                        $horariosTexto .= htmlspecialchars($horario['dia']) . " " . htmlspecialchars($horario['hora_inicio']) . "-" . htmlspecialchars($horario['hora_fin']) . "|";
                                    }
                                } else {
                                    $horariosTexto = "(Sin horarios disponibles)";
                                }
                            ?>
                            <option value="<?= htmlspecialchars($grupo['grupo_id']) ?>" data-horarios="<?= $horariosTexto ?>">
                                <?= htmlspecialchars($grupo['curso']) ?> | <?= htmlspecialchars($grupo['fecha_inicio']) ?> - <?= htmlspecialchars($grupo['fecha_fin']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div id="horariosContainer" class="d-none mt-3">
                    <div class="card border-dark">
                        <div class="card-header bg-dark text-white">
                            <strong>Horarios del Grupo</strong>
                        </div>
                        <div class="card-body">
                            <ul id="listaHorarios" class="list-group list-group-flush"></ul>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-dark w-100 mt-3 fw-bold">Confirmar Matrícula</button>
            </form>
        <?php else : ?>
            <div class="alert alert-warning text-center p-3">
                <i class="bi bi-info-circle"></i> No tienes pagos aprobados pendientes de matrícula.
            </div>
        <?php endif; ?>
    </div>

    <?php include __DIR__ . '/../inc/footer.php'; ?>
    
    <script>
    function mostrarHorarios() {
        var select = document.getElementById("grupo_id");
        var selectedOption = select.options[select.selectedIndex];
        var horariosContainer = document.getElementById("horariosContainer");
        var listaHorarios = document.getElementById("listaHorarios");

        listaHorarios.innerHTML = "";

        if (selectedOption.value) {
            var horarios = selectedOption.getAttribute("data-horarios").split("|").filter(Boolean);

            if (horarios.length > 0) {
                horarios.forEach(function(horario) {
                    var listItem = document.createElement("li");
                    listItem.classList.add("list-group-item");
                    listItem.textContent = horario;
                    listaHorarios.appendChild(listItem);
                });
            } else {
                var listItem = document.createElement("li");
                listItem.classList.add("list-group-item", "text-muted");
                listItem.textContent = "(Sin horarios disponibles)";
                listaHorarios.appendChild(listItem);
            }

            horariosContainer.classList.remove("d-none");
        } else {
            horariosContainer.classList.add("d-none");
        }
    }
    </script>
</body>
</html>
