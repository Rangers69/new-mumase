<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
  <div class="container position-relative">
    <div class="row gy-5" data-aos="fade-in">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
        <h2>Detail Guru <span>SMK Muhammadiyah 15 Jakarta</span></h2>
        <p>Informasi lengkap mengenai tenaga pengajar kami.</p>
        <div class="d-flex justify-content-center justify-content-lg-start">
          <a href="<?php echo base_url('gurucontroller'); ?>" class="btn-get-started">Kembali ke Daftar Guru</a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 text-center">
        <img src="assets/img/hero-img.png" class="img-fluid" alt="" />
      </div>
    </div>
  </div>
</section>
<!-- End Hero Section -->

<!-- ======= Main Section ======= -->
<main id="main">
  <!-- ======= Start Guru Detail Section ======= -->
  <section id="guru-detail" class="team px-4 mt-4">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Profil Guru</h2>
        <p>Informasi lengkap mengenai tenaga pengajar profesional kami.</p>
      </div>

      <?php if (!empty($guru)): ?>
        <div class="row">
          <div class="col-lg-4 col-md-5">
            <div class="member">
              <img src="assets/img/guru/<?php echo $guru->foto_guru ?: 'default.jpg'; ?>" class="img-fluid" alt="<?php echo $guru->nama_guru; ?>" />
              <h4><?php echo $guru->nama_guru; ?></h4>
              <span class="mb-3"><?php echo $guru->jurusan; ?></span>
            </div>
          </div>
          
          <div class="col-lg-8 col-md-7">
            <div class="member-info">
              <h3>Informasi Pribadi</h3>
              <div class="info-grid">
                <div class="info-item">
                  <strong>Nama Lengkap:</strong>
                  <p><?php echo $guru->nama_guru; ?></p>
                </div>
                <div class="info-item">
                  <strong>NIP:</strong>
                  <p><?php echo $guru->nip; ?></p>
                </div>
                <div class="info-item">
                  <strong>Email:</strong>
                  <p><a href="mailto:<?php echo $guru->email; ?>"><?php echo $guru->email; ?></a></p>
                </div>
                <div class="info-item">
                  <strong>Telepon:</strong>
                  <p><a href="tel:<?php echo $guru->telepon; ?>"><?php echo $guru->telepon; ?></a></p>
                </div>
                <div class="info-item">
                  <strong>Jurusan:</strong>
                  <p><?php echo $guru->jurusan; ?></p>
                </div>
              </div>

              <?php if (!empty($guru->pendidikan)): ?>
              <h3 class="mt-4">Pendidikan</h3>
              <p><?php echo nl2br($guru->pendidikan); ?></p>
              <?php endif; ?>

              <?php if (!empty($guru->pengalaman)): ?>
              <h3 class="mt-4">Pengalaman</h3>
              <p><?php echo nl2br($guru->pengalaman); ?></p>
              <?php endif; ?>

              <?php if (!empty($guru->mata_pelajaran)): ?>
              <h3 class="mt-4">Mata Pelajaran yang Diampu</h3>
              <p><?php echo $guru->mata_pelajaran; ?></p>
              <?php endif; ?>

              <div class="action-buttons mt-4">
                <a href="<?php echo base_url('gurucontroller/edit/' . $guru->id_guru); ?>" class="btn btn-warning">
                  <i class="bi bi-pencil"></i> Edit Data
                </a>
                <a href="<?php echo base_url('gurucontroller/hapus/' . $guru->id_guru); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                  <i class="bi bi-trash"></i> Hapus Data
                </a>
                <a href="<?php echo base_url('gurucontroller'); ?>" class="btn btn-secondary">
                  <i class="bi bi-arrow-left"></i> Kembali
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php else: ?>
        <div class="alert alert-warning text-center">
          <i class="bi bi-exclamation-triangle"></i> Data guru tidak ditemukan.
        </div>
      <?php endif; ?>
    </div>
  </section>
  <!-- End Guru Detail Section -->
</main>
<!-- End Main Section -->

<style>
.info-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1rem;
  margin-bottom: 2rem;
}

.info-item {
  padding: 1rem;
  background: #f8f9fa;
  border-radius: 8px;
  border-left: 4px solid #007bff;
}

.info-item strong {
  color: #007bff;
  display: block;
  margin-bottom: 0.5rem;
}

.info-item p {
  margin: 0;
  color: #333;
}

.action-buttons {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
}

.member-info h3 {
  color: #333;
  border-bottom: 2px solid #007bff;
  padding-bottom: 0.5rem;
  margin-bottom: 1rem;
}
</style>
