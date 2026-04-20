

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Welcome to <span>SMK Muh 15 Jakarta</span></h2>
          <p>School of Bussiness Multimedia</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="ppdb.php"  class="btn-get-started ppdb">PPDB</a>
            <a href="https://www.youtube.com/watch?v=NE9qCuAOJdQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 text-center px-4">
          <div class="parallax-container hero-parallax" data-aos="zoom-out" data-aos-delay="100">
            <div class="parallax-content">
              <!-- Content can be added here if needed -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">
          <!-- Start Icon Box -->
          <?php
          if (!empty($jurusan)) {
            foreach ($jurusan as $row) {
              $id_jurusan = $row->id_jurusan;
              $icon_jurusan = $row->icon_jurusan;
              $nama_jurusan = $row->nama_jurusan;
              $deskripsi_jurusan = $row->deskripsi_jurusan;
          ?>

            <div class="col-xl-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="icon-box p-5">
                <div class="icon"><i class="<?php echo $icon_jurusan; ?>"></i></div>
                <h4 class="title">
                  <a href="#" class="stretched-link"><?php echo $nama_jurusan; ?></a>
                </h4>
                <p><?php echo $deskripsi_jurusan; ?></p>
              </div>
            </div>
          <?php
            }
          }
          ?>
          <!-- End Icon Box -->
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero Section -->

  <!-- ======= Start News Section ======= -->
<section id="news" class="blog sections-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Berita Terbaru</h2>
      <p>
        Informasi terbaru seputar kegiatan sekolah, prestasi siswa,
        pengumuman, dan berita penting lainnya dari
        SMK Muhammadiyah 15 Jakarta.
      </p>
    </div>

    <div class="row gy-4 posts-list">

      <?php if (!empty($news)) : ?>
        <?php foreach ($news as $row) : ?>

          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <?php if (!empty($row->thumbnail)) : ?>
                  <img src="assets/img/<?php echo $row->thumbnail; ?>" alt="" class="img-fluid">
                <?php else : ?>
                  <img src="assets/img/blog-placeholder.jpg" alt="" class="img-fluid">
                <?php endif; ?>
              </div>

              <p class="post-category">
                <?php echo $row->category_name ?? 'News'; ?>
              </p>

              <h2 class="title">
                <a href="<?php echo base_url('news/detail/' . $row->slug); ?>">
                  <?php echo $row->title; ?>
                </a>
              </h2>

              <div class="d-flex align-items-center">
                <div class="post-meta">

                  <p class="post-date">
                    <time datetime="<?php echo date('Y-m-d', strtotime($row->published_at)); ?>">
                      <?php echo date('d M Y', strtotime($row->published_at)); ?>
                    </time>
                  </p>
                </div>
              </div>

              <p class="mt-3">
                <?php echo substr(strip_tags($row->short_description), 0, 120); ?>
              </p>

              <a href="<?php echo base_url('news/detail/' . $row->slug); ?>" class="readmore stretched-link">
                Baca Selengkapnya
                <i class="bi bi-arrow-right"></i>
              </a>

            </article>
          </div>

        <?php endforeach; ?>
      <?php else : ?>

        <div class="col-12 text-center">
          <div class="alert alert-light border">
            <i class="bi bi-newspaper fs-3 d-block mb-2"></i>
            Belum ada berita terbaru.
          </div>
        </div>

      <?php endif; ?>

    </div>

    <div class="text-center mt-5">
      <a href="<?php echo base_url('news'); ?>" class="btn btn-primary px-4">
        Lihat Semua Berita
      </a>
    </div>

  </div>
</section>
<!-- ======= End News Section ======= -->

  <!-- ======= Start Main Section ======= -->
  <main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-header px-4 mt-4">
          <h2>Tentang Kami</h2>
          <p>
            SMK Muhammadiyah 15 Jakarta Selatan adalah sekolah berbasis
            kejuruan digital, dengan pelaksanaan pembinaan berlandaskan kepada
            nilai-nilai pendidikan bernafaskan keislaman yang diambil dari
            nilai-nilai al-quran dan as-sunnah, sebagai upaya dalam mencetak
            mutu lulusan yang berkarakter pebisnis digital yang amanah dan
            berwawasan universal serta global. Melalui pembelajaran berbasis
            program unggulan.
          </p>
        </div>

        <div id="visi-misi" class="row gy-4 mt-4">
          <div class="col-lg-6 px-4">
            <h3>Visi dan Misi SMK Muhammadiyah 15 Jakarta Selatan</h3>
            <img src="assets/img/wisuda25.JPG" class="img-fluid rounded-4 mb-4" alt="" />
            <p>
              Visi kami adalah: <br /><br /><span class="fst-italic">"Terwujudnya Sekolah Kejuruan Yang Unggul, berakhlak mulia, profesional, mandiri, dan mampu bersaing di era global."</span>
            </p>
            <p>
              Dengan visi tersebut, kami memiliki harapan tinggi untuk
              mewujudkan sumber daya manusia yang berakhlakul karimah, yaitu
              individu yang memiliki akhlak mulia yang didasarkan pada iman
              dan taqwa. Kami percaya bahwa dengan dasar moral yang kokoh,
              lulusan kami akan menjadi pionir dalam menguasai ilmu
              pengetahuan dan teknologi secara global. Visi kami adalah
              menciptakan individu yang tidak hanya kompeten dalam bidang
              akademis, tetapi juga memiliki integritas moral yang tinggi,
              yang akan membawa manfaat bagi masyarakat dan dunia.
            </p>
          </div>
          <div class="col-lg-6 px-4">
            <div class="content ps-0 ps-lg-5">
              <p>Sedangkan misi kami adalah:</p>
              <ul>
                <li>
                  <i class="bi bi-check-circle-fill"></i> Meningkatkan Nilai-Nilai Religius Dan Berakhlak Mulia Pada Warga Sekolah.
                </li>
                <li>
                  <i class="bi bi-check-circle-fill"></i> Menyelenggarakan pendidikan multimedia dan bisnis yang berkualitas.
                </li>
                <li>
                  <i class="bi bi-check-circle-fill"></i> Membangun budaya sekolah yang Islami dan berakhlak mulia.
                </li>
                <li>
                  <i class="bi bi-check-circle-fill"></i> Membina kerjasama dengan berbagai pihak untuk meningkatkan mutu pendidikan.
                </li>
                <li>
                  <i class="bi bi-check-circle-fill"></i> Meningkatkan lulusan yang kompeten, berkarakter Islami, dan siap kerja di industri multimedia dan bisnis.
                </li>
                <li>
                  <i class="bi bi-check-circle-fill"></i> Mengembangkan jiwa wirausaha dan technopreneurship pada siswa.
                </li>
              </ul>
              <p>
                Kami berharap bahwa melalui visi dan misi ini, lulusan kami
                akan menjadi agen perubahan yang mampu memberikan kontribusi
                positif bagi masyarakat, menghadapi tantangan dunia modern,
                menciptakan lapangan kerja, dan memimpin dalam berbagai
                bidang, dengan integritas moral yang tinggi.
              </p>

              <div class="position-relative mt-4">
                <img src="assets/img/about.jpg" class="img-fluid rounded-4" alt="" />
                <a href="https://www.youtube.com/watch?v=sbb-38qcjP8" class="glightbox play-btn"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End About Us Section -->

    <!-- ======= Start Partnership Section ======= -->
    <section id="partnership" class="clients mt-4">
      <div class="container" data-aos="zoom-out">
        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <!-- Start Partnership Item -->
            <?php
            if (!empty($partnership)) {
              foreach ($partnership as $row) {
                $logo_partnership = $row->logo_partnership;
                $nama_partnership = $row->nama_partnership;
            ?>
              <div class="swiper-slide">
                <img src="assets/img/partnership/<?php echo $logo_partnership; ?>" class="img-fluid" alt="<?php echo $nama_partnership; ?>" />
              </div>
            <?php
              }
            }
            ?>
            <!-- End Partnership Item -->
          </div>
        </div>
      </div>
    </section>
    <!-- End Partnership Section -->

    <!-- ======= Start Statistik Section ======= -->
    <section id="statistik" class="stats-counter">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4 align-items-center">
          <div class="col-lg-6 px-4">
            <img src="assets/img/stats-img.jpg" alt="" class="img-fluid" />
          </div>

          <div class="col-lg-6 px-4">
            
            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $jumlah_siswa; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>
                <strong>Peserta Didik</strong> terdaftar sebagai siswa aktif.
              </p>
            </div>
            <!-- End Stats Item -->

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $jumlah_guru; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>
                <strong>Tenaga Pengajar</strong> profesional pada bidangnya
              </p>
            </div>
            <!-- End Stats Item -->

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $jumlah_kelas; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>
                <strong>Ruang Kelas</strong> dengan fasilitas memenuhi standar
              </p>
            </div>
            <!-- End Stats Item -->

          </div>
        </div>
      </div>
    </section>
    <!-- End Statistik Section -->

    <!-- ======= Start Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action px-4">
      <div class="container text-center" data-aos="zoom-out">
        <a href="https://www.youtube.com/watch?v=NE9qCuAOJdQ" class="glightbox play-btn"></a>
        <h3>Gabung Bersama Kami</h3>
        <p>
          Bergabunglah dengan SMK Muhammadiyah 15 Jakarta Selatan untuk mendapatkan pendidikan kejuruan digital yang berbasis nilai-nilai Islam agar menjadi pebisnis digital yang amanah dan berwawasan luas.
        </p>
        <a class="cta-btn" href="https://docs.google.com/forms/d/e/1FAIpQLSeO3kz7rbzdT3N4aOTTNlrfFjcoYRgOLfCP1DfARnHrYqfvdQ/viewform">Daftar</a>
      </div>
    </section>
    <!-- End Call To Action Section -->

    <!-- ======= Start Program Section ======= -->
    <section id="program" class="services sections-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header px-4">
          <h2>Program Unggulan</h2>
          <p>
            Berikut adalah program unggulan SMK Muhammadiyah 15 Jakarta, yang
            membuka pintu kepada peluang tak terbatas dan mempersiapkan siswa
            untuk masa depan yang penuh potensi.
          </p>
        </div>

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
          <!-- Start Service Item -->
          <?php
          if (!empty($program)) {
            foreach ($program as $row) {
              $icon_program = $row->icon_program;
              $nama_program = $row->nama_program;
              $deskripsi_program = $row->deskripsi_program;

              // Batasi deskripsi program hanya memiliki maksimum 150 karakter
              if (strlen($deskripsi_program) > 150) {
                $deskripsi_program = substr($deskripsi_program, 0, 150);
                $last_space = strrpos($deskripsi_program, ' ');
                if ($last_space !== false) {
                  $deskripsi_program = substr($deskripsi_program, 0, $last_space);
                }
                $deskripsi_program .= '...';
              }
          ?>
              <div class="col-lg-4 col-md-6">
                <div class="service-item position-relative">
                  <div class="icon">
                    <i class="<?php echo $icon_program; ?>"></i>
                  </div>
                  <h3><?php echo $nama_program; ?></h3>
                  <p><?php echo $deskripsi_program; ?></p>
                  <a href="#" class="readmore stretched-link">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
          <?php
            }
          }
          ?>
          <!-- End Service Item -->
        </div>
      </div>
    </section>
    <!-- End Program Section -->

    <!-- ======= Start Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Testimoni Alumni</h2>
          <p>
            Dengarlah langsung cerita inspiratif dari individu yang mengambil
            langkah pertama menuju kesuksesan mereka, berkat fondasi yang kami
            bangun di SMK Muhammadiyah 15 Jakarta.
          </p>
        </div>

        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <!-- Start testimonial item -->
          <div class="swiper-wrapper">
            <?php
            if (!empty($testimoni)) {
              foreach ($testimoni as $row) {
                $foto_alumni = $row->foto_alumni;
                $nama_alumni = $row->nama_alumni;
                $profesi_alumni = $row->profesi_alumni;
                $komentar_alumni = $row->komentar_alumni;

                // Batasi komentar hanya memiliki maksimum 450 karakter dan berhenti di kata terakhir
                if (strlen($komentar_alumni) > 450) {
                  $komentar_alumni = substr($komentar_alumni, 0, 450);
                  $last_space = strrpos($komentar_alumni, ' ');
                  if ($last_space !== false) {
                    $komentar_alumni = substr($komentar_alumni, 0, $last_space);
                  }
                  $komentar_alumni .= '...';
                }
            ?>
              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <div class="d-flex align-items-center">
                      <img src="assets/img/testimoni/<?php echo $foto_alumni; ?>" class="testimonial-img flex-shrink-0" alt="" />
                      <div>
                        <h3><?php echo $nama_alumni; ?></h3>
                        <h4><?php echo $profesi_alumni; ?></h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <?php echo $komentar_alumni; ?>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div>
            <?php
              }
            }
            ?>
          </div>
          <div div class="swiper-pagination"></div>
        </div>
        <!-- End testimonial item -->
      </div>
    </section>
    <!-- End Testimonials Section -->

    <!-- ======= Start Sarpras Section ======= -->
    <section id="sarpras" class="portfolio sections-bg px-4 mt-4">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Sarana Prasarana</h2>
          <p>
            Kami percaya bahwa dengan sarana prasarana yang lengkap, siswa kami akan memiliki segala yang mereka butuhkan untuk meraih kesuksesan dalam pendidikan dan pengembangan diri.
          </p>
        </div>
        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
          <div>
            <ul class="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-lab">Lab</li>
              <li data-filter=".filter-studio">Studio</li>
              <li data-filter=".filter-kelas">Kelas</li>
              <li data-filter=".filter-lainnya">Lainnya</li>
            </ul>
            <!-- End Portfolio Filters -->
          </div>
          <div class="row gy-4 portfolio-container">
            <?php
            if (!empty($sarpras)) {
              foreach ($sarpras as $row) {
                $foto_sarpras = $row->foto_sarpras;
                $nama_sarpras = $row->nama_sarpras;
                $deskripsi_sarpras = $row->deskripsi_sarpras;
                $kategori_sarpras = $row->kategori_sarpras;
            ?>
              <div class="col-xl-4 col-md-6 portfolio-item filter-<?php echo $kategori_sarpras; ?>">
                <div class="portfolio-wrap">
                  <a href="assets/img/sarpras/<?php echo $foto_sarpras; ?>" data-gallery="portfolio-gallery-app" class="glightbox">
                    <img src="assets/img/sarpras/<?php echo $foto_sarpras; ?>" class="img-fluid" alt="">
                  </a>
                  <div class="portfolio-info">
                    <h4>
                      <a href="portfolio-details.html" title="More Details"><?php echo $nama_sarpras; ?></a>
                    </h4>
                    <p>
                      <?php echo $deskripsi_sarpras; ?>
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Portfolio Item -->
            <?php
              }
            }
            ?>
          </div>
          <!-- End Portfolio Container -->
        </div>
      </div>
    </section>
    <!-- End Sarpras Section -->

    <!-- ======= Start Pimpinan Section ======= -->
    <section id="pimpinan" class="team px-4">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Pimpinan</h2>
          <p>
            Pimpinan kami berperan penting dalam membentuk budaya sekolah yang
            inklusif dan dinamis, serta berusaha untuk memberikan pengalaman
            pendidikan yang unggul bagi semua siswa.
          </p>
        </div>

        <div class="row gy-4 justify-content-center">
          <?php
          if (!empty($pimpinan)) {
            foreach ($pimpinan as $row) {
              $foto_pimpinan = "assets/img/pimpinan/" . $row->foto_pimpinan;
              $nama_pimpinan = $row->nama_pimpinan;
              $jabatan_pimpinan = $row->jabatan_pimpinan;
          ?>
            <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
              <div class="member">
                <img src="<?php echo $foto_pimpinan; ?>" class="img-fluid" alt="" />
                <h4 style="font-size: 18px;"><?php echo $nama_pimpinan; ?></h4>
                <span class="mb-3"><?php echo $jabatan_pimpinan; ?></span>
              </div>
            </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </section>
    <!-- End Pimpinan Section -->

    <!-- ======= Start Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq px-4">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-lg-4">
            <div class="content px-xl-5">
              <h3 class="mb-3"><strong>Pertanyaan</strong> yang Sering Diajukan</h3>
              <p>
                Kami memahami bahwa calon siswa dan orang tua mungkin memiliki
                pertanyaan sebelum memutuskan untuk bergabung dengan sekolah
                kami. Di bawah ini, kami telah merangkum beberapa pertanyaan
                yang sering diajukan:
              </p>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    <span class="num">1.</span>
                    Apa saja program unggulan yang tersedia di SMK Muh 15?
                  </button>
                </h3>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Kami menawarkan berbagai program unggulan yang mencakup
                    tahfiz, siswa mengajar, ramadhan produktif, bussiness
                    club, web developer, dan content creator. Setiap program
                    didesain untuk memberikan pengalaman belajar yang luar
                    biasa dan relevan dengan dunia industri saat ini namun
                    tetap berlandaskan iman dan taqwa.
                  </div>
                </div>
              </div>
              <!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    <span class="num">2.</span>
                    Apakah SMK Muh 15 menyediakan opsi bantuan keuangan bagi
                    siswanya?
                  </button>
                </h3>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Kami menyediakan berbagai opsi bantuan keuangan, termasuk
                    beasiswa berbasis prestasi dan kebutuhan seperti KJP dan
                    PIP. Kami ingin memastikan bahwa semua siswa yang
                    berkualifikasi memiliki kesempatan untuk bergabung dengan
                    SMK Muh 15.
                  </div>
                </div>
              </div>
              <!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    <span class="num">3.</span>
                    Siapakah pimpinan sekolah dan staf pengajar di SMK Muh 15?
                  </button>
                </h3>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Saat ini SMK Muh 15 dipimpin oleh Bapak Moch. Nor Hasan,
                    S.Kom. , yang didukung oleh tim pengajar kami yang terdiri
                    dari 20 tenaga pengajar berpengalaman dan berkualitas.
                    Mereka tidak hanya memiliki komitmen terhadap pendidikan
                    berlandaskan iman dan taqwa, tetapi juga membekali siswa
                    dengan pengetahuan dan keterampilan yang relevan untuk
                    menghadapi tantangan dunia industri saat ini.
                  </div>
                </div>
              </div>
              <!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <span class="num">4.</span>
                    Apa saja fasilitas dan sarana prasarana yang tersedia di
                    SMK Muh 15?
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Kami memiliki fasilitas modern dan lengkap yang mencakup
                    17 ruang kelas terpadu, 3 laboratorium, 3 studio, 1 aula
                    serbaguna, kantin dan area lapangan, guna menciptakan
                    lingkungan belajar yang optimal. Sarana prasarana kami
                    tidak hanya mendukung aspek pendidikan, tetapi juga
                    menciptakan lingkungan yang mendukung perkembangan
                    spiritual dan pribadi siswa.
                  </div>
                </div>
              </div>
              <!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                    <span class="num">5.</span>
                    Bagaimana cara mendaftar di SMK Muh 15?
                  </button>
                </h3>
                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Proses pendaftaran kami sangat sederhana. Anda dapat
                    mengunjungi halaman PPDB / SPMB kami untuk informasi lebih lanjut
                    dan petunjuk mengenai langkah-langkahnya.
                  </div>
                </div>
              </div>
              <!-- # Faq item-->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Frequently Asked Questions Section -->

    <!-- ======= Start Contact Section ======= -->
    <section id="contact" class="contact px-4">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Kontak Kami</h2>
          <p>
            Silakan hubungi kami untuk berbagai keperluan, baik itu pertanyaan
            tentang program pendidikan, pendaftaran, atau informasi lainnya.
          </p>
        </div>

        <div class="row gx-lg-0 gy-4">
          <div class="col-lg-4">
            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Alamat:</h4>
                  <p>
                    Jl. Karet Belakang Raya No.4, RT 10/RW 2, Karet Kuningan,
                    Setiabudi, Jakarta Selatan
                  </p>
                </div>
              </div>
              <!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>smkmuh15setiabudi@gmail.com</p>
                </div>
              </div>
              <!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Telepon:</h4>
                  <p>(021) 52920657</p>
                </div>
              </div>
              <!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h4>Jam Buka</h4>
                  <p>Senin-Jumat: 07.00 - 16.00</p>
                </div>
              </div>
              <!-- End Info Item -->
            </div>
          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required />
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required />
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required />
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">
                  Pesan Anda sudah terkirim. Terima Kasih!
                </div>
              </div>
              <div class="text-center">
                <button type="submit">Kirim Pesan</button>
              </div>
            </form>
          </div>
          <!-- End Contact Form -->
        </div>
      </div>
    </section>
    <!-- End Contact Section -->
  </main>
  <!-- End Main Section -->

  <!-- Hero Parallax CSS -->
  <style>
    .hero-parallax {
      position: relative;
      width: 100%;
      height: 100%;
      background-image: url('assets/img/hero-img3.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      overflow: hidden;
      border-radius: 15px;
      box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }

    .hero-parallax::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(135deg, rgba(0,123,255,0.1), rgba(111,66,193,0.1));
      border-radius: 15px;
    }

    .parallax-content {
      position: relative;
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .hero-parallax {
        height: 300px;
        background-attachment: scroll; /* Disable parallax on mobile for better performance */
      }
    }

    @media (max-width: 576px) {
      .hero-parallax {
        height: 250px;
        margin: 0 -15px;
        border-radius: 0;
      }
    }

    /* Smooth scroll behavior */
    html {
      scroll-behavior: smooth;
    }
  </style>