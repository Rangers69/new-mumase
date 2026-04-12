<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
  <div class="container position-relative">
    <div class="row gy-5" data-aos="fade-in">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
        <h2>Edit Guru <span>SMK Muhammadiyah 15 Jakarta</span></h2>
        <p>Perbarui data tenaga pengajar yang sudah ada.</p>
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
  <!-- ======= Start Edit Guru Section ======= -->
  <section id="edit-guru" class="contact px-4 mt-4">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Form Edit Guru</h2>
        <p>Perbarui data guru dengan informasi terbaru.</p>
      </div>

      <!-- Flash Messages -->
      <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <?php if (!empty($guru)): ?>
        <form action="<?php echo base_url('gurucontroller/proses_edit'); ?>" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
          <input type="hidden" name="id_guru" value="<?php echo $guru->id_guru; ?>" />
          
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="nama_guru">Nama Lengkap <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="nama_guru" id="nama_guru" value="<?php echo set_value('nama_guru', $guru->nama_guru); ?>" placeholder="Masukkan nama lengkap guru" required />
              <?php echo form_error('nama_guru', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="nip">NIP <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="nip" id="nip" value="<?php echo set_value('nip', $guru->nip); ?>" placeholder="Masukkan NIP" required />
              <?php echo form_error('nip', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6 form-group mt-3">
              <label for="email">Email <span class="text-danger">*</span></label>
              <input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email', $guru->email); ?>" placeholder="Masukkan email guru" required />
              <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="telepon">Telepon <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="telepon" id="telepon" value="<?php echo set_value('telepon', $guru->telepon); ?>" placeholder="Masukkan nomor telepon" required />
              <?php echo form_error('telepon', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>

          <div class="form-group mt-3">
            <label for="jurusan">Jurusan <span class="text-danger">*</span></label>
            <select class="form-control" name="jurusan" id="jurusan" required>
              <option value="">Pilih Jurusan</option>
              <option value="DKV" <?php echo set_select('jurusan', 'DKV', $guru->jurusan == 'DKV'); ?>>Desain Komunikasi Visual (DKV)</option>
              <option value="RPL" <?php echo set_select('jurusan', 'RPL', $guru->jurusan == 'RPL'); ?>>Rekayasa Perangkat Lunak (RPL)</option>
              <option value="Multimedia" <?php echo set_select('jurusan', 'Multimedia', $guru->jurusan == 'Multimedia'); ?>>Multimedia</option>
              <option value="Bisnis" <?php echo set_select('jurusan', 'Bisnis', $guru->jurusan == 'Bisnis'); ?>>Bisnis Digital</option>
            </select>
            <?php echo form_error('jurusan', '<small class="text-danger">', '</small>'); ?>
          </div>

          <div class="form-group mt-3">
            <label for="pendidikan">Pendidikan</label>
            <textarea class="form-control" name="pendidikan" id="pendidikan" rows="3" placeholder="Masukkan riwayat pendidikan guru"><?php echo set_value('pendidikan', $guru->pendidikan); ?></textarea>
          </div>

          <div class="form-group mt-3">
            <label for="pengalaman">Pengalaman</label>
            <textarea class="form-control" name="pengalaman" id="pengalaman" rows="3" placeholder="Masukkan pengalaman mengajar guru"><?php echo set_value('pengalaman', $guru->pengalaman); ?></textarea>
          </div>

          <div class="form-group mt-3">
            <label for="mata_pelajaran">Mata Pelajaran yang Diampu</label>
            <input type="text" class="form-control" name="mata_pelajaran" id="mata_pelajaran" value="<?php echo set_value('mata_pelajaran', $guru->mata_pelajaran); ?>" placeholder="Contoh: Matematika, Fisika, Kimia" />
          </div>

          <div class="form-group mt-3">
            <label for="foto_guru">Foto Guru</label>
            <input type="file" class="form-control" name="foto_guru" id="foto_guru" accept="image/*" />
            <small class="form-text text-muted">Format: JPG, JPEG, PNG, GIF. Maksimal: 2MB. Kosongkan jika tidak ingin mengubah foto.</small>
            <?php if (!empty($guru->foto_guru)): ?>
              <div class="mt-2">
                <small>Foto saat ini:</small><br>
                <img src="assets/img/guru/<?php echo $guru->foto_guru; ?>" alt="Foto Guru" style="max-width: 100px; max-height: 100px; border-radius: 5px;">
              </div>
            <?php endif; ?>
          </div>

          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">
              Data guru berhasil diperbarui!
            </div>
          </div>
          
          <div class="text-center">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-save"></i> Perbarui Data Guru
            </button>
            <a href="<?php echo base_url('gurucontroller/detail/' . $guru->id_guru); ?>" class="btn btn-info">
              <i class="bi bi-eye"></i> Lihat Detail
            </a>
            <a href="<?php echo base_url('gurucontroller'); ?>" class="btn btn-secondary">
              <i class="bi bi-arrow-left"></i> Kembali
            </a>
          </div>
        </form>
      <?php else: ?>
        <div class="alert alert-warning text-center">
          <i class="bi bi-exclamation-triangle"></i> Data guru tidak ditemukan.
        </div>
      <?php endif; ?>
    </div>
  </section>
  <!-- End Edit Guru Section -->
</main>
<!-- End Main Section -->
