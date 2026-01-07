<footer class="footer-dark">
  <div class="container">
    <div class="row g-5">
      
      <!-- Columna 1: Marca -->
      <div class="col-lg-3 col-md-6 text-center text-md-start">
        <img src="{{ asset('img/amisam.png') }}" alt="Logo AMISAM" class="mb-4" style="height: 80px; width: auto; filter: drop-shadow(0 0 10px rgba(255,255,255,0.2));">
        <p class="small">
            Formación profesional de alto nivel en diseño, ingeniería y tecnología.
        </p>
        <!-- Redes Sociales -->
        <div class="social-icons mt-4">
            <a href="#" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="#" target="_blank"><i class="bi bi-tiktok"></i></a>
        </div>
      </div>

      <!-- Columna 2: Enlaces Rápidos -->
      <div class="col-lg-3 col-md-6">
        <h5 class="footer-heading">Navegación</h5>
        <ul class="list-unstyled">
          <li><a href="{{ url('/') }}">Inicio</a></li>
          <li><a href="#bene-container">Beneficios</a></li>
          <li><a href="#id-container">Cursos</a></li>
          <li><a href="#">Términos y Condiciones</a></li>
        </ul>
      </div>

      <!-- Columna 3: Información -->
      <div class="col-lg-3 col-md-6">
        <h5 class="footer-heading">Legal</h5>
        <ul class="list-unstyled">
          <li><a href="#">Nosotros</a></li>
          <li><a href="#">Política de Privacidad</a></li>
          <li><a href="#">Libro de Reclamaciones</a></li>
          <!-- Enlace al Webmail añadido aquí -->
          <li class="mt-2">
            <a href="https://mail.hostinger.com/" target="_blank" rel="noopener noreferrer" class="text-white-50 hover-white">
                <i class="bi bi-envelope-at-fill me-1"></i> Acceso Webmail
            </a>
          </li>
        </ul>
      </div>

      <!-- Columna 4: Contacto -->
      <div class="col-lg-3 col-md-6" id="contacto">
        <h5 class="footer-heading">Contacto</h5>
        <ul class="list-unstyled">
            <li class="mb-3 d-flex text-start">
                <i class="bi bi-whatsapp me-3 text-success"></i>
                <span>940 277 254</span>
            </li>
            <li class="mb-3 d-flex text-start">
                <i class="bi bi-envelope me-3 text-primary"></i>
                <a href="mailto:soporte@autocadtotal.com" class="d-inline p-0">soporte@autocadtotal.com</a>
            </li>
            <li class="d-flex text-start">
                <i class="bi bi-clock me-3 text-warning"></i>
                <div>
                    Lun – Vie: 08:00 – 20:00<br>
                    Sáb: 09:00 – 13:00
                </div>
            </li>
        </ul>
      </div>

    </div>

    <!-- Copyright -->
    <div class="bottom-bar text-center">
      &copy; <span id="current-year"></span> AMISAM. Todos los derechos reservados.
    </div>
  </div>

  <script>
    document.getElementById('current-year').textContent = new Date().getFullYear();
  </script>
</footer>