<!-- Footer -->
</div>
<footer class="content-footer footer bg-footer-theme" style="opacity: .5;">
  <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
    <div class="mb-2 mb-md-0">
      ©
      <script>
        document.write(new Date().getFullYear());
      </script>
      , hecho con ❤️ para 
      <a  class="footer-link fw-bolder">Silvia's</a>
    </div>
    <div>
      <a href="#" class="footer-link me-4">Ayuda</a>
      <a href="<?php echo APP_URL?>cerrarSesion"  class="footer-link me-4">Salir</a>
    </div>
  </div>
</footer>
<!-- / Footer -->


</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->

</div>
<!-- / Layout wrapper -->

<!-- Page CSS -->
<?php echo view('Estructura/Scripts_view') ?>
<style>
  input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
.swal2-container {
    z-index: 1090 !important;
}
</style>
</body>

</html>