<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
  <div class="container position-relative">
    <div class="row gy-5" data-aos="fade-in">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
        <h2>Tambah Guru <span>SMK Muhammadiyah 15 Jakarta</span></h2>
        <p>Tambahkan data tenaga pengajar baru ke dalam sistem.</p>
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
  <!-- ======= Start Add Guru Section ======= -->
  <section id="add-guru" class="contact px-4 mt-4">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Form Tambah Guru</h2>
        <p>Silakan lengkapi data guru baru dengan benar.</p>
      </div>

      <!-- Flash Messages -->
      <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="<?php echo base_url('gurucontroller/proses_tambah'); ?>" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6 form-group">
            <label for="nama_guru">Nama Lengkap <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama_guru" id="nama_guru" placeholder="Masukkan nama lengkap guru" required />
            <?php echo form_error('nama_guru', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col-md-6 form-group mt-3 mt-md-0">
            <label for="nip">NIP <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP" required />
            <?php echo form_error('nip', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6 form-group mt-3">
            <label for="email">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email guru" required />
            <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col-md-6 form-group mt-3 mt-md-0">
            <label for="telepon">Telepon <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Masukkan nomor telepon" required />
            <?php echo form_error('telepon', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="form-group mt-3">
          <label for="jurusan">Jurusan <span class="text-danger">*</span></label>
          <select class="form-control" name="jurusan" id="jurusan" required>
            <option value="">Pilih Jurusan</option>
            <option value="DKV">Desain Komunikasi Visual (DKV)</option>
            <option value="RPL">Rekayasa Perangkat Lunak (RPL)</option>
            <option value="Multimedia">Multimedia</option>
            <option value="Bisnis">Bisnis Digital</option>
          </select>
          <?php echo form_error('jurusan', '<small class="text-danger">', '</small>'); ?>
        </div>

        <div class="form-group mt-3">
          <label for="pendidikan">Pendidikan</label>
          <textarea class="form-control" name="pendidikan" id="pendidikan" rows="3" placeholder="Masukkan riwayat pendidikan guru"></textarea>
        </div>

        <div class="form-group mt-3">
          <label for="pengalaman">Pengalaman</label>
          <textarea class="form-control" name="pengalaman" id="pengalaman" rows="3" placeholder="Masukkan pengalaman mengajar guru"></textarea>
        </div>

        <div class="form-group mt-3">
          <label for="mata_pelajaran">Mata Pelajaran yang Diampu</label>
          <input type="text" class="form-control" name="mata_pelajaran" id="mata_pelajaran" placeholder="Contoh: Matematika, Fisika, Kimia" />
        </div>

        <div class="form-group mt-3">
          <label for="foto_guru">Foto Guru</label>
          <input type="file" class="form-control" name="foto_guru" id="foto_guru" accept="image/*" />
          <small class="form-text text-muted">Format: JPG, JPEG, PNG, GIF. Maksimal: 2MB</small>
        </div>

        <div class="my-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">
            Data guru berhasil ditambahkan!
          </div>
        </div>
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan Data Guru
          </button>
          <a href="<?php echo base_url('gurucontroller'); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Batal
          </a>
        </div>
      </form>
    </div>
  </section>
  <!-- End Add Guru Section -->
</main>
<!-- End Main Section -->
