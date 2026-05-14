</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>SMK Muhammadiyah 15 Jakarta</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <script>
    /**
     * Sidebar Toggle Logic
     */
    (function() {
      "use strict";
      const toggleBtn = document.querySelector('.toggle-sidebar-btn');
      if (toggleBtn) {
        toggleBtn.onclick = function(e) {
          document.body.classList.toggle('toggle-sidebar');
        }
      }
    })();

    let sessionTimeout = <?= $this->config->item('sess_expiration') * 1000 ?>;

    setTimeout(function() {
        window.location.href = "<?= base_url('auth/logout') ?>";
    }, sessionTimeout);
  </script>
</body>

</html>