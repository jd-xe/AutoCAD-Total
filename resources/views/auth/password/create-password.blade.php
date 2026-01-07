<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Crear Nueva Contraseña</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #1a1a1a;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1rem;
    }

    .password-card {
      background-color: #2b2b2b;
      border-radius: 1rem;
      padding: 2rem;
      max-width: 420px;
      width: 100%;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
      color: #fff;
    }

    .password-card h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      color: #ffffff;
      font-weight: 600;
    }

    .form-label {
      color: #ccc;
      font-weight: 500;
    }

    .form-control {
      background-color: #1e1e1e;
      border: 1px solid #444;
      color: #fff;
      border-radius: 0.5rem;
      padding: 0.75rem 1rem;
    }

    .form-control:focus {
      border-color: #e53935;
      box-shadow: 0 0 0 0.2rem rgba(229, 57, 53, 0.25);
    }

    .btn-primary {
      background-color: #e53935;
      border: none;
      border-radius: 0.5rem;
      font-weight: 500;
      padding: 0.75rem 1.5rem;
      transition: background-color 0.3s ease, transform 0.1s;
    }

    .btn-primary:hover {
      background-color: #c62828;
      transform: translateY(-1px);
    }

    .alert-danger {
      background-color: #3a1c1c;
      border-color: #c62828;
      color: #fddede;
      border-radius: 0.5rem;
    }

    ul.mb-0 li {
      margin-bottom: 0.5rem;
    }
  </style>
</head>
<body>
  <div class="password-card">
    <h2>Crear Nueva Contraseña</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('password.reset.store') }}">
      @csrf

      <input type="hidden" name="token" value="{{ $token }}">
      <input type="hidden" name="email" value="{{ $email }}">

      <div class="mb-4">
        <label for="password" class="form-label">Nueva Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" required autofocus>
      </div>

      <div class="mb-4">
        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Guardar</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
