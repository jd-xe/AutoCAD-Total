<style>
  footer {
    padding-top: 70px;
  }
</style>
<footer class="bg-dark text-white pt-4 pb-2">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-2 mb-3 mb-md-0 text-center">
        <img class="img-fluid" src="<?php echo BASE_URL; ?>/img/amisam.png" style="height: 120px;" alt="logo empresa" />
      </div>
      <div class="col-md-4 mb-3 mb-md-0 text-center">
        <h5>Síguenos en</h5>
        <div class="d-flex justify-content-center gap-3">
          <a href="#" target="_blank" class="text-white text-decoration-none fs-4">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="#" target="_blank" class="text-white text-decoration-none fs-4">
            <i class="bi bi-instagram"></i>
          </a>
          <a href="#" target="_blank" class="text-white text-decoration-none fs-4">
            <i class="bi bi-tiktok"></i>
          </a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-6 col-md-4">
            <ul class="list-unstyled">
              <li><a href="#" class="text-white text-decoration-none">Inicio</a></li>
              <li><a href="#" class="text-white text-decoration-none">Términos y Condiciones</a></li>
              <li><a href="#" class="text-white text-decoration-none">Políticas de Privacidad</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-4">
            <ul class="list-unstyled">
              <li><a href="#" class="text-white text-decoration-none">Nosotros</a></li>
              <li><a href="#" class="text-white text-decoration-none">Contáctanos</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <hr class="text-secondary">
    <div class="row">
      <div class="col text-center">
        <p class="mb-0">&copy; <span id="current-year"></span> AMISAM. Todos los derechos reservados.</p>
      </div>
    </div>
  </div>
</footer>
<script>
  const currentYear = new Date().getFullYear();
  document.getElementById('current-year').textContent = currentYear;
</script>