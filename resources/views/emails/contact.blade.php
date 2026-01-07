<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Mensaje de Contacto</title>
</head>
<body style="font-family: Arial, sans-serif;">
    <h2>Has recibido un nuevo mensaje desde la web.</h2>
    <p><strong>De:</strong> {{ $data['name'] }} {{ $data['lastname'] }}</p>
    <p><strong>Correo:</strong> {{ $data['email'] }}</p>
    <p><strong>Celular:</strong> {{ $data['phone'] }}</p>
    <p><strong>Asunto:</strong> {{ $data['subject'] }}</p>
    <hr>
    <h3>Mensaje:</h3>
    <p>{{ $data['message'] }}</p>
</body>
</html>