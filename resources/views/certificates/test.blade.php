<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generar Certificado</title>
</head>
<body>
    <h1>Generar Certificado</h1>

    <form action="{{ route('certificates.generate') }}" method="POST">
        @csrf
        <label for="user_id">ID Usuario:</label>
        <input type="number" name="user_id" id="user_id" required><br><br>

        <label for="course_group_id">ID Grupo del Curso:</label>
        <input type="number" name="course_group_id" id="course_group_id" required><br><br>

        <label for="enrollment_id">ID Inscripción (opcional):</label>
        <input type="number" name="enrollment_id" id="enrollment_id"><br><br>

        <button type="submit">Generar PDF</button>
    </form>
</body>
</html>
