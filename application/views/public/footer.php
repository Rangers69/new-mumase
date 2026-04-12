<!-- ======= Start Footer ======= -->
  <footer id="footer" class="footer px-4">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>Tentang Kami</span>
          </a>
          <p>
            SMK Muhammadiyah 15 Jakarta Selatan adalah sekolah kejuruan
            digital yang berlandaskan nilai-nilai pendidikan Islam dan program
            unggulan. Kami mencetak lulusan berkarakter pebisnis digital yang
            amanah dan berwawasan global.
          </p>
          <div class="social-links d-flex mt-4">
            <a href="https://web.facebook.com/smkmuh15" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/officialmuh15/" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://www.tiktok.com/@officialmuh15" class="tiktok"><i class="bi bi-tiktok"></i></a>
            <a href="https://maps.app.goo.gl/8LLfTswY5NyxhnuB6" class="maps"><i class="bi bi-geo-alt-fill"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Tautan Berguna</h4>
          <ul>
            <li><a href="#hero">Home</a></li>
            <li><a href="#about">Visi & Misi</a></li>
            <li><a href="#statistik">Statistik Sekolah</a></li>
            <li><a href="#program">Program Unggulan</a></li>
            <li><a href="#pimpinan">Pimpinan</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Lainnya</h4>
          <ul>
            <li><a href="#sarpras">Sarana Prasarana</a></li>
            <li><a href="ppdb.php">PPDB/SPMB</a></li>
            <li><a href="#">Kejuruan</a></li>
            <li><a href="#">Ekstrakurikuler</a></li>
            <li><a href="jadwal-pelajaran.php">Jadwal Pelajaran</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Kontak Kami</h4>
          <p>
            Jl. Karet Belakang Raya No.4,
            RT 10/RW 2, Karet Kuningan,
            Setiabudi, Jakarta Selatan<br />
            <strong>Telepon:</strong> (021) 52920657<br />
            <strong>Email:</strong> smkmuh15setiabudi@gmail.com
          </p>
        </div>
      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>SMK Muh 15</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
        Designed by <a href="#">Team IT SMKMuh15</a>
      </div>
    </div>
  </footer>
  <!-- End Footer Section -->

  <!-- ======= Start Back To Top Section ======= -->
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- End Back To Top Section -->

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Parallax Effect Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const parallaxImages = document.querySelectorAll('.parallax-image');
      
      function updateParallax() {
        const scrolled = window.pageYOffset;
        
        parallaxImages.forEach(image => {
          const rect = image.getBoundingClientRect();
          const speed = 0.5; // Adjust this value to control parallax speed
          const yPos = -(scrolled * speed);
          
          // Only apply parallax when image is in viewport
          if (rect.bottom >= 0 && rect.top <= window.innerHeight) {
            image.style.transform = `translateY(${yPos}px)`;
          }
        });
      }
      
      // Throttle scroll events for better performance
      let ticking = false;
      function requestTick() {
        if (!ticking) {
          window.requestAnimationFrame(updateParallax);
          ticking = true;
          setTimeout(() => { ticking = false; }, 16); // ~60fps
        }
      }
      
      window.addEventListener('scroll', requestTick);
      window.addEventListener('resize', updateParallax);
      
      // Initial call
      updateParallax();
    });
  </script>
</body>

</html>