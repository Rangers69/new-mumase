<!-- ======= Page Title ======= -->
<div class="pagetitle">
  <h1>Tambah Guru</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('guru/active'); ?>">Master Data</a></li>
      <li class="breadcrumb-item active">Guru</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body pt-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h5 class="card-title mb-1">Tambah Data Guru Baru</h5>
          <p class="text-muted mb-0">
            Silakan lengkapi form di bawah ini untuk menambahkan data guru baru.
          </p>
        </div>
      </div>

      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="bi bi-exclamation-triangle me-2"></i>
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle me-2"></i>
          <?php echo $this->session->flashdata('success'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="<?php echo base_url('guru/simpan'); ?>" method="post" role="form" enctype="multipart/form-data">
        <div class="row">
          <!-- Informasi Personal -->
          <div class="col-lg-12 mb-4">
            <h6 class="text-primary fw-bold mb-3">
              <i class="bi bi-person-badge me-2"></i>Informasi Personal
            </h6>
            
            <div class="row g-3">
              <div class="col-md-6">
                <label for="nama_guru" class="form-label">
                  Nama Lengkap <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="bi bi-person"></i>
                  </span>
                  <input type="text" class="form-control" name="nama_guru" id="nama_guru" 
                         placeholder="Masukkan nama lengkap guru" required 
                         value="<?php echo set_value('nama_guru'); ?>">
                </div>
                <?php echo form_error('nama_guru', '<div class="text-danger small mt-1">', '</div>'); ?>
              </div>
              
              <div class="col-md-6">
                <label for="nip" class="form-label">
                  NIP <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="bi bi-card-text"></i>
                  </span>
                  <input type="text" class="form-control" name="nip" id="nip" 
                         placeholder="Masukkan NIP" required 
                         value="<?php echo set_value('nip'); ?>">
                </div>
                <?php echo form_error('nip', '<div class="text-danger small mt-1">', '</div>'); ?>
              </div>
            </div>
          </div>

          <!-- Informasi Personal - Additional -->
          <div class="col-lg-12 mb-4">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="hobi" class="form-label">
                  Hobi
                </label>
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="bi bi-heart"></i>
                  </span>
                  <input type="text" class="form-control" name="hobi" id="hobi" 
                         placeholder="Masukkan hobi guru (pisahkan dengan koma jika lebih dari satu)" 
                         value="<?php echo set_value('hobi'); ?>">
                </div>
                <?php echo form_error('hobi', '<div class="text-danger small mt-1">', '</div>'); ?>
              </div>
              <div class="col-md-6">
                <label for="tanggal_bergabung" class="form-label">
                  Tanggal Bergabung
                </label>
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="bi bi-calendar"></i>
                  </span>
                  <input type="date" class="form-control" name="tanggal_bergabung" id="tanggal_bergabung" 
                         value="<?php echo set_value('tanggal_bergabung', date('Y-m-d')); ?>">
                </div>
                <?php echo form_error('tanggal_bergabung', '<div class="text-danger small mt-1">', '</div>'); ?>
              </div>
            </div>
          </div>

          <!-- Informasi Kontak -->
          <div class="col-lg-12 mb-4">
            <h6 class="text-primary fw-bold mb-3">
              <i class="bi bi-telephone me-2"></i>Informasi Kontak
            </h6>
            
            <div class="row g-3">
              <div class="col-md-6">
                <label for="email" class="form-label">
                  Email <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="bi bi-envelope"></i>
                  </span>
                  <input type="email" class="form-control" name="email" id="email" 
                         placeholder="email@example.com" required 
                         value="<?php echo set_value('email'); ?>">
                </div>
                <?php echo form_error('email', '<div class="text-danger small mt-1">', '</div>'); ?>
              </div>
              
              <div class="col-md-6">
                <label for="telepon" class="form-label">
                  Nomor HP <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="bi bi-telephone"></i>
                  </span>
                  <input type="tel" class="form-control" name="no_hp" id="no_hp" 
                         placeholder="0812-3456-7890" required 
                         value="<?php echo set_value('no_hp'); ?>">
                </div>
                <?php echo form_error('no_hp', '<div class="text-danger small mt-1">', '</div>'); ?>
              </div>
            </div>
          </div>

          <!-- Informasi Akademik -->
          <div class="col-lg-12 mb-4">
            <h6 class="text-primary fw-bold mb-3">
              <i class="bi bi-mortarboard me-2"></i>Informasi Akademik
            </h6>
            
            <div class="row g-3">
               <div class="col-md-6">
                <label for="pendidikan" class="form-label">
                  Pendidikan
                </label>
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="bi bi-award"></i>
                  </span>
                  <select class="form-select" name="pendidikan" id="pendidikan">
                    <option value="">Pilih Pendidikan</option>
                    <option value="SMK" <?php echo set_select('pendidikan', 'SMK'); ?>>
                      SMK
                    </option>
                    <option value="D3" <?php echo set_select('pendidikan', 'D3'); ?>>
                      D3
                    </option>
                    <option value="S1" <?php echo set_select('pendidikan', 'S1'); ?>>
                      S1
                    </option>
                    <option value="S2" <?php echo set_select('pendidikan', 'S2'); ?>>
                      S2
                    </option>
                  </select>
                </div>
                <?php echo form_error('pendidikan', '<div class="text-danger small mt-1">', '</div>'); ?>
              </div>
              
              <div class="col-md-6">
                <label class="form-label">
                  Mata Pelajaran yang Diampu <span class="text-danger">*</span>
                </label>
                <div class="border rounded p-3" style="max-height: 220px; overflow-y: auto;">
                  <?php if (!empty($mapel)): ?>
                    <?php foreach ($mapel as $m): ?>
                      <div class="form-check">
                        <input 
                          class="form-check-input" 
                          type="checkbox" 
                          name="id_mapel[]" 
                          value="<?php echo $m->id_mapel; ?>" 
                          id="mapel_<?php echo $m->id_mapel; ?>"
                          <?php echo in_array($m->id_mapel, (array) set_value('id_mapel', [])) ? 'checked' : ''; ?>
                        >
                        <label class="form-check-label" for="mapel_<?php echo $m->id_mapel; ?>">
                          <?php echo $m->nama_mapel; ?>
                        </label>
                      </div>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <div class="text-muted">Data mapel belum tersedia.</div>
                  <?php endif; ?>
                </div>
                <?php echo form_error('id_mapel[]', '<div class="text-danger small mt-1">', '</div>'); ?>
              </div>
            </div>
          </div>


          <!-- Upload Foto -->
          <div class="col-lg-12 mb-4">
            <h6 class="text-primary fw-bold mb-3">
              <i class="bi bi-image me-2"></i>Foto Guru
            </h6>
            
            <div class="row">
              <div class="col-md-6">
                <label for="foto_guru" class="form-label">
                  Upload Foto
                </label>
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="bi bi-camera"></i>
                  </span>
                  <input type="file" class="form-control" name="foto_guru" id="foto_guru" 
                         accept="image/*">
                </div>
                <div class="form-text text-muted mt-2">
                  <i class="bi bi-info-circle me-1"></i>
                  Format: JPG, JPEG, PNG, GIF. Maksimal: 2MB
                </div>
                <?php echo form_error('foto_guru', '<div class="text-danger small mt-1">', '</div>'); ?>
              </div>
            </div>
          </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="row mt-4">
          <div class="col-12">
            <div class="d-flex justify-content-end gap-2">
              <a href="<?php echo base_url('guru/active'); ?>" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                Batal
              </a>
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i>
                Simpan Data Guru
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
