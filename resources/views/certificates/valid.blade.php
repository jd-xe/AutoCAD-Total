<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado válido</title>
</head>
<body>
    <h1>✅ Certificado válido</h1>
    <p>Emitido para: <strong>{{ $user->first_name }} {{ $user->last_name }}</strong></p>
    <p>Curso: <strong>{{ $course->name ?? 'N/A' }}</strong></p>
    <p>Fecha de emisión: <strong>{{ $document->created_at->format('d/m/Y') }}</strong></p>

    <a href="{{ asset('storage/' . $document->document_url) }}" target="_blank">Ver certificado</a>
</body>
</html>
